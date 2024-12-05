<template>
    <div ref="gameContainer" class="game-container">
        <button
            @click="toggle"
            class="p-2 flex content-center border bg-red-400 m-3 rounded hover:bg-red-700"
        >
            {{ isRunning ? "Stop" : "Start" }}
        </button>
        <button
            @click="reset"
            class="p-2 flex content-center border bg-green-400 m-3 rounded hover:bg-green-700"
        >
            Reset
        </button>
        <button @click="enlarge">bigger</button>
        <br />
        <button class="border bg-red-300">
            <a :href="route('users.index')">go to users</a>
        </button>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, watch } from "vue";
import { route } from "ziggy-js";

class snakeFood {
    constructor(x, y) {
        this.x = x;
        this.y = y;
    }
    reposition(canvasWidth, canvasHeight) {
        this.x = Math.floor(Math.random() * (canvasWidth - 20)) + 10;
        this.y = Math.floor(Math.random() * (canvasHeight - 20)) + 10;
    }
    draw(ctx) {
        ctx.fillStyle = "green";
        ctx.beginPath();
        ctx.arc(this.x, this.y, 10, 0, Math.PI * 2);
        ctx.fill();
    }
}

class Snake {
    constructor(x, y) {
        this.x = x;
        this.y = y;
        this.speed = 2;
        this.direction = { x: 1, y: 0 }; // Initial direction: moving right
        this.body = [{ x: this.x, y: this.y }];
        this.maxLength = 10; // Maximum length of the snake
    }

    changeDirection(newDirection) {
        this.direction = newDirection;
    }

    move() {
        this.x += this.direction.x * this.speed;
        this.y += this.direction.y * this.speed;

        // Add new head position to the body
        this.body.push({ x: this.x, y: this.y });

        // Remove the oldest segment if the snake exceeds its maximum length
        if (this.body.length > this.maxLength) {
            this.body.shift();
        }
    }

    draw(ctx) {
        ctx.fillStyle = "red";
        for (const segment of this.body) {
            ctx.beginPath();
            ctx.arc(segment.x, segment.y, 10, 0, Math.PI * 2);
            ctx.fill();
        }
    }
}

const gameContainer = ref(null);
const canvas = document.createElement("canvas");
const ctx = canvas.getContext("2d");
const snake = new Snake(100, 100);
const isRunning = ref(false);
const storedSpeed = ref(snake.speed);
const food = new snakeFood(200, 200);

const start = () => {
    update();
};

const stop = () => {
    snake.speed = 0;
};

const reset = () => {
    snake.x = 100;
    snake.y = 100;
    snake.direction = { x: 1, y: 0 };
    snake.body = [{ x: snake.x, y: snake.y }];
    snake.speed = 2;
    storedSpeed.value = snake.speed;
    snake.maxLength = 10;
    food.reposition(canvas.width, canvas.height);
};

const toggle = () => {
    isRunning.value = !isRunning.value;
    if (isRunning.value) {
        // Restore the snake's speed to continue in the same direction
        snake.speed = storedSpeed.value;
        start();
    } else {
        // Store the current speed before stopping
        storedSpeed.value = snake.speed;
        stop();
    }
};
const enlarge = () => {
    snake.maxLength += 10;
    food.reposition(canvas.width, canvas.height);
};

const checkCollisionWithFood = async () => {
    if (Math.abs(snake.x - food.x) < 20 && Math.abs(snake.y - food.y) < 20) {
        snake.maxLength += 10;
        food.reposition(canvas.width, canvas.height);
    }
};
watch(
    () => [snake.x, snake.y],
    () => {
        checkCollisionWithFood();
    }
);

const update = () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    food.draw(ctx);

    // Draw the floor
    ctx.fillStyle = "green";
    ctx.fillRect(0, canvas.height - 50, canvas.width, 50);
    checkCollisionWithFood();
    snake.move();
    snake.draw(ctx);
    if (isRunning.value) {
        requestAnimationFrame(update);
    }
};

const handleKeydown = (event) => {
    switch (event.key) {
        case "ArrowUp":
            snake.changeDirection({ x: 0, y: -1 });
            break;
        case "ArrowDown":
            snake.changeDirection({ x: 0, y: 1 });
            break;
        case "ArrowLeft":
            snake.changeDirection({ x: -1, y: 0 });
            break;
        case "ArrowRight":
            snake.changeDirection({ x: 1, y: 0 });
            break;
    }
};

onMounted(() => {
    gameContainer.value.appendChild(canvas);
    canvas.width = 1000;
    canvas.height = window.innerHeight;
    canvas.style.border = "1px solid black";
    canvas.style.backgroundColor = "lightblue";
    snake.canvasWidth = canvas.width;
    food.draw(ctx);

    window.addEventListener("keydown", handleKeydown);
});

onUnmounted(() => {
    window.removeEventListener("keydown", handleKeydown);
});
</script>

<style scoped>
.game-container {
    width: 1000px;
    height: 100%;
}
</style>
