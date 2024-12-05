<template>
    <nav
        @mouseenter="openDropDown(true), console.log(open)"
        @mouseleave="openDropDown(false), console.log(open)"
        :class="{ 'bg-gray-100/100': open }"
        class="bg-gray-100/90 sticky group top-0 w-full left-0 z-50 blur-none"
    >
        <div class="flex items-center justify-center">
            <ul
                class="flex text-xs justify-evenly mx-56 content-center items-center justify-items-center w-full"
            >
                <li>
                    <span>
                        <a href="#" class="hover:text-blue-500">
                            <svg
                                height="48"
                                viewBox="0 0 17 48"
                                width="14"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="m13.0729 17.6825a3.61 3.61 0 0 0 -1.7248 3.0365 3.5132 3.5132 0 0 0 2.1379 3.2223 8.394 8.394 0 0 1 -1.0948 2.2618c-.6816.9812-1.3943 1.9623-2.4787 1.9623s-1.3633-.63-2.613-.63c-1.2187 0-1.6525.6507-2.644.6507s-1.6834-.9089-2.4787-2.0243a9.7842 9.7842 0 0 1 -1.6628-5.2776c0-3.0984 2.014-4.7405 3.9969-4.7405 1.0535 0 1.9314.6919 2.5924.6919.63 0 1.6112-.7333 2.8092-.7333a3.7579 3.7579 0 0 1 3.1604 1.5802zm-3.7284-2.8918a3.5615 3.5615 0 0 0 .8469-2.22 1.5353 1.5353 0 0 0 -.031-.32 3.5686 3.5686 0 0 0 -2.3445 1.2084 3.4629 3.4629 0 0 0 -.8779 2.1585 1.419 1.419 0 0 0 .031.2892 1.19 1.19 0 0 0 .2169.0207 3.0935 3.0935 0 0 0 2.1586-1.1368z"
                                ></path>
                            </svg>
                        </a>
                    </span>
                </li>
                <li
                    class="group group-hover:translate-y-52 transition-all duration-1000 ease-in-out group-hover:bg-gray-100 rounded-lg w-full fixed space-x-3 p-12 translate-y-[-100%] group-hover:block delay-150"
                >
                    <ul>
                        <li class="grid grid-cols-3 gap-9">
                            <div class="text-xl font-bold space-y-2 group">
                                <h1
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-700"
                                >
                                    Shop
                                </h1>
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-750"
                                    >Shop the Latest</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-800"
                                    >Mac</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-850"
                                    >iPad</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-900"
                                    >iPhone</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-950"
                                    >Apple Watch</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-1000"
                                    >Apple Vision Pro</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-1050"
                                    >Accessories</a
                                >
                            </div>

                            <div class="group">
                                <h1
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-700"
                                >
                                    Quick links
                                </h1>
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-750"
                                >
                                    Shop the Latest
                                </a>
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-800"
                                >
                                    Shop the Latest
                                </a>
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-850"
                                    >Mac</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-900"
                                    >iPad</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-950"
                                    >iPhone</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-1000"
                                    >Apple Watch</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-1050"
                                    >Apple Vision Pro</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-1100"
                                    >Accessories</a
                                >
                            </div>

                            <!-- Another child with transition properties -->
                            <div class="group">
                                <h1
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-700"
                                >
                                    Quick links
                                </h1>
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-750"
                                >
                                    Shop the Latest
                                </a>
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-800"
                                >
                                    Shop the Latest
                                </a>
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-850"
                                    >Mac</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-900"
                                    >iPad</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-950"
                                    >iPhone</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-1000"
                                    >Apple Watch</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-1050"
                                    >Apple Vision Pro</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-1100"
                                    >Accessories</a
                                >
                            </div>
                        </li>
                    </ul>
                </li>

                <a
                    @mouseenter="openDropDownStore(true), console.log(open)"
                    @mouseleave="openDropDownStore(false), console.log(open)"
                    href="#"
                    class="hover:text-blue-500 group/store sticky"
                    >Store
                </a>
                <li><a href="#" class="hover:text-blue-500">ipad</a></li>
                <li><a href="#" class="hover:text-blue-500">iphone</a></li>
                <li><a href="#" class="hover:text-blue-500">Watch</a></li>
                <li><a href="#" class="hover:text-blue-500">vision</a></li>
                <li><a href="#" class="hover:text-blue-500">Airpods</a></li>
                <li>
                    <a href="#" class="hover:text-blue-500">TV & Home</a>
                </li>
                <li>
                    <a href="#" class="hover:text-blue-500">Entertainment</a>
                </li>

                <li>
                    <a href="#" class="hover:text-blue-500">Accessories</a>
                </li>
                <li><a href="#" class="hover:text-blue-500">Support</a></li>
                <li>
                    <a href="#" class="hover:text-blue-500">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="15px"
                            height="44px"
                            viewBox="0 0 15 44"
                        >
                            <path
                                d="M14.298,27.202l-3.87-3.87c0.701-0.929,1.122-2.081,1.122-3.332c0-3.06-2.489-5.55-5.55-5.55c-3.06,0-5.55,2.49-5.55,5.55 c0,3.061,2.49,5.55,5.55,5.55c1.251,0,2.403-0.421,3.332-1.122l3.87,3.87c0.151,0.151,0.35,0.228,0.548,0.228 s0.396-0.076,0.548-0.228C14.601,27.995,14.601,27.505,14.298,27.202z M1.55,20c0-2.454,1.997-4.45,4.45-4.45 c2.454,0,4.45,1.997,4.45,4.45S8.454,24.45,6,24.45C3.546,24.45,1.55,22.454,1.55,20z"
                            ></path>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="hover:text-blue-500">
                        <svg
                            height="44"
                            viewBox="0 0 14 44"
                            width="14"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="m11.3535 16.0283h-1.0205a3.4229 3.4229 0 0 0 -3.333-2.9648 3.4229 3.4229 0 0 0 -3.333 2.9648h-1.02a2.1184 2.1184 0 0 0 -2.117 2.1162v7.7155a2.1186 2.1186 0 0 0 2.1162 2.1167h8.707a2.1186 2.1186 0 0 0 2.1168-2.1167v-7.7155a2.1184 2.1184 0 0 0 -2.1165-2.1162zm-4.3535-1.8652a2.3169 2.3169 0 0 1 2.2222 1.8652h-4.4444a2.3169 2.3169 0 0 1 2.2222-1.8652zm5.37 11.6969a1.0182 1.0182 0 0 1 -1.0166 1.0171h-8.7069a1.0182 1.0182 0 0 1 -1.0165-1.0171v-7.7155a1.0178 1.0178 0 0 1 1.0166-1.0166h8.707a1.0178 1.0178 0 0 1 1.0164 1.0166z"
                            ></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <body
        :class="{
            'transition-all ease-in-out duration-300 blur-lg bg-black opacity-80 delay-500':
                open,
        }"
    >
        <div class="py-4">
            <div class="flex justify-center">
                <span class="text-sm text-center">
                    Starting 11/29, get an Apple Gift Card up to $200 when you
                    buy an eligible product — online and in-store.<sup>
                        <a
                            href="#footnote-1"
                            class="footnote footnote-number underline"
                            aria-label="Footnote 1"
                            >1</a
                        >
                    </sup>
                    <a href="#" class="text-blue-700"> Learn more ></a>
                </span>
            </div>
        </div>

        <section class="pb-5">
            <div
                class="bg-local bg-center bg-no-repeat bg-cover h-screen"
                style="
                    background-image: url(https://www.apple.com/v/home/bv/images/heroes/iphone-16-pro/hero_iphone16pro_avail__fnf0f9x70jiy_medium_2x.jpg);
                "
            >
                <div class="text-white flex justify-center p-16">
                    <div>
                        <h1 id="heading">iPhone 16 Pro</h1>
                        <p id="subheading">Hello, Apple Intelligence.</p>
                        <div class="justify-center space-x-7 flex p-3">
                            <button
                                class="bg-blue-500 text-white border-blue-500 border rounded-3xl px-6 py-2 text-lg"
                            >
                                Learn more
                            </button>
                            <button
                                class="border-blue-500 text-blue-500 border rounded-3xl px-6 py-2 hover:bg-blue-500 hover:text-white"
                            >
                                Buy
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-5">
            <div
                class="bg-local bg-center bg-no-repeat bg-cover h-screen"
                style="
                    background-image: url(https://www.apple.com/v/home/bv/images/heroes/iphone-16/hero_iphone16_avail__euwzls69btea_medium_2x.jpg);
                "
            >
                <div class="text-white flex justify-center p-16">
                    <div>
                        <h1 id="heading">iPhone 16</h1>
                        <p id="subheading">Hello, Apple Intelligence.</p>
                        <div class="justify-center space-x-7 flex p-3">
                            <button
                                class="bg-white text-black border-blue-500 border rounded-3xl px-6 py-2 text-lg"
                            >
                                Learn more
                            </button>
                            <button
                                class="border-white text-white border rounded-3xl px-6 py-2 hover:bg-white hover:text-black"
                            >
                                Buy
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-5">
            <div
                class="bg-local bg-center bg-no-repeat bg-cover h-screen flex flex-col justify-end"
                style="
                    background-image: url(https://www.apple.com/v/home/bv/images/heroes/ipad-air/hero_ipad_air__enn6321t3tkm_mediumtall_2x.jpg);
                "
            >
                <div class="text-white flex justify-center p-16">
                    <div>
                        <h1 id="ipadair">iPad air</h1>
                        <p class="text-black text-center text-2xl">
                            Two sizes. Faster chip. Does it all.
                        </p>
                        <div class="justify-center space-x-7 flex p-3">
                            <button
                                class="bg-blue-500 text-white border-blue-500 border rounded-3xl px-6 py-2 text-lg"
                            >
                                Learn more
                            </button>
                            <button
                                class="border-blue-500 text-blue-500 border rounded-3xl px-6 py-2 hover:bg-blue-500 hover:text-white"
                            >
                                Buy
                            </button>
                        </div>
                    </div>
                </div>
                <div
                    class="h-full text-white relative justify-center flex items-center"
                >
                    <p id="isolate">
                        <span> Hello, Apple Intelligence. </span>
                    </p>
                </div>
            </div>
        </section>
        <section class="pb-5">
            <div
                class="bg-local bg-center bg-no-repeat bg-cover h-screen flex flex-col justify-end"
                style="
                    background-image: url(https://www.apple.com/v/home/bv/images/promos/airpods-4/promo_airpods_4_avail__bl22kvpg6ez6_medium_2x.jpg);
                "
            >
                <div class="text-white flex justify-center p-16">
                    <div>
                        <h1 id="ipadair">iPad air</h1>
                        <p class="text-black text-center text-2xl">
                            Two sizes. Faster chip. Does it all.
                        </p>
                        <div class="justify-center space-x-7 flex p-3">
                            <button
                                class="bg-blue-500 text-white border-blue-500 border rounded-3xl px-6 py-2 text-lg"
                            >
                                Learn more
                            </button>
                            <button
                                class="border-blue-500 text-blue-500 border rounded-3xl px-6 py-2 hover:bg-blue-500 hover:text-white"
                            >
                                Buy
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</template>

<script setup lang="ts">
import { ref } from "vue";

function openDropDown(value) {
    open.value = value;
}
function openDropDownStore(value) {
    openStore.value = value;
}
const open = ref(false);
const openStore = ref(false);
console.log(openDropDown);
</script>

<style scoped>
#heading {
    font-size: 55px;
    font-weight: bold;
    color: white;
    line-height: 1;
    text-align: center;
}
#subheading {
    font-size: 28px;
    color: white;
    text-align: center;
}
#ipadair {
    font-size: 48px;
    line-height: 1.08349;
    font-weight: 600;
    letter-spacing: -0.002em;
    font-family: "SF Pro Display", "SF Pro Icons", "Helvetica Neue", "Helvetica",
        "Arial", sans-serif;
    color: #1d1d1f;
    text-align: center;
}
#isolate {
    font-size: 21px;
    font-family: "SF Pro Display", "SF Pro Icons", "Helvetica Neue", "Helvetica",
        "Arial", sans-serif;
    background: linear-gradient(94deg, #0090f7, #ba62fc, #f2416b, #f55600);
    background-clip: text;
    color: transparent;
    display: inline-block;
    letter-spacing: 0.011em;
    text-align: center;
    bottom: 60px;
    position: absolute;
    font-weight: 500 !important;
    background-size: 100%; /* Adjust the background size */
    background-position: center;
}

.nav-item {
    position: relative;
    margin-right: 20px;
}

.dropdown-menu:hover {
    display: block; /* Show the dropdown on hover */
    opacity: 1;
    visibility: visible;
    transition: opacity 0.3s ease;
}
.transition {
    transition-property: all;
    transition-behavior: normal;
    transition-duration: 40s;
    transition-timing-function: ease;
    transition-delay: 40s;
    transition-property: height;
}
</style>
