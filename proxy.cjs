const express = require("express");
const cors = require("cors");
const { createProxyMiddleware } = require("http-proxy-middleware");

const app = express();

// Use CORS middleware
app.use(
    cors({
        origin: "http://firstherd.test", // Allow requests from this origin
        methods: "GET,POST,PUT,DELETE,OPTIONS",
        allowedHeaders: "Content-Type,Authorization",
    })
);

app.use(
    "/api",
    createProxyMiddleware({
        target: "https://api.test.uinsure.co.uk",
        changeOrigin: true,
        pathRewrite: {
            "^/api": "", // remove /api prefix when forwarding to target
        },
        onProxyReq: (proxyReq, req, res) => {
            proxyReq.setHeader("Origin", "https://api.test.uinsure.co.uk");
        },
        onProxyRes: (proxyRes, req, res) => {
            proxyRes.headers["Access-Control-Allow-Origin"] =
                "http://firstherd.test";
            proxyRes.headers["Access-Control-Allow-Methods"] =
                "GET,POST,PUT,DELETE,OPTIONS";
            proxyRes.headers["Access-Control-Allow-Headers"] =
                "Content-Type,Authorization";
        },
    })
);

app.listen(3000, () => {
    console.log("Proxy server is running on http://localhost:3000");
});
