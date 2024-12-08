<template>
    <AppHeader
        @mouseenter="openDropDown(true), console.log(open)"
        @mouseleave="openDropDown(false), console.log(open)"
        :class="{ 'bg-gray-100/100': open }"
    ></AppHeader>
    <body
        :class="{
            'transition-all ease-in-out duration-300 blur-lg delay-300': open,
            'transition-all ease-in-out duration-300 delay-300': !open,
        }"
    >
        <div class="p-3">
            <!-- <h1 id="logo" class="text-8xl font-extrabold text-center">
                HALPERN INSURANCE
            </h1>
            <hr class="border-2 border-mustard mb-5 mx-32" />
            <h1 class="text-5xl text-mustard font-extrabold text-center">
                HALPERN & PARTNERS INSURANCE SERVICES LTD
            </h1> -->
            <div class="bg-mustard">
                <h1 class="text-5xl font-extrabold text-center font-mono">
                    Exceptional coverage, competitive prices.
                </h1>
                <h1 class="text-6xl font-extrabold text-center font-serif">
                    Security without compromise.
                </h1>
            </div>
        </div>
        <!-- <p id="subheading" class="text-lg flex text-center px-32 py-3">
            At Halpern Insurance Services, we offer bespoke insurance solutions
            tailored to your needs, including home and commercial coverages.
            With decades of experience and personal, expert service, we ensure
            the best policies and competitive premiums.
        </p> -->
        <!-- <section id="logo-gradient" class="p-10 items-center h-screen">
            <img src="/images/unborder.png" alt="" />
            <div>
                <div class="flex justify-center p-16">
                    <div>
                        <p id="subheading" class="text-lg">
                            At Halpern Insurance Services, we offer bespoke
                            insurance solutions tailored to your needs,
                            including home and commercial coverages. With
                            decades of experience and personal, expert service,
                            we ensure the best policies and competitive
                            premiums.
                        </p>
                    </div>
                </div>
            </div>
        </section> -->

        <section class="pb-5">
            <div
                class="bg-local bg-center bg-no-repeat bg-cover h-screen rounded-xl"
                style="background-image: url('images/Home.jpg')"
            >
                <div class="justify-center p-16 flex">
                    <div>
                        <h1 id="heading" class="heading">
                            Home Insurance
                            <p id="subheading" class="">
                                Safeguard your home and belongings with
                                comprehensive cover.
                            </p>
                            <button></button>
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-5 grid grid-cols-3">
            <div
                class="bg-local bg-center bg-no-repeat bg-cover h-screen col-span-2 rounded-xl"
                style="background-image: url('images/commercial.jpg')"
            >
                <div class="flex justify-center p-16">
                    <div>
                        <h1 id="heading" class="heading text-white">
                            Commercial insurance
                            <p id="subheading" class="text-white">
                                Secure your business with flexible and reliable
                                coverage.
                            </p>
                        </h1>
                    </div>
                </div>
            </div>
            <div>
                By working with leading insurers, we’re able to offer
                competitive premiums while maintaining the highest standards of
                service. At Halpern Insurance Services, you can expect personal
                attention from our team of experienced professionals who are
                always ready to provide tailored advice — no call centres or
                automated systems. We understand the importance of protecting
                what matters most to you, which is why we focus on making the
                insurance process as simple and straightforward as possible.
                Whether you prefer to meet face-to-face or speak with us by
                phone, we’re here to help you find the best coverage without any
                hassle. Get in touch with our friendly team today to discuss
                your insurance needs. Call Halpern Insurance Services on 020
                8800 1211.
            </div>
        </section>
        <section class="pb-5 grid grid-cols-3">
            <div>wefdw</div>
            <div
                class="bg-local bg-center bg-no-repeat bg-cover h-screen col-span-2 rounded-xl"
                style="background-image: url('images/terraced.jpg')"
            >
                <div class="flex justify-center p-16">
                    <div>
                        <h1 id="heading" class="heading text-white">
                            Landlords insurance
                            <p id="subheading" class="text-white">
                                Tailored protection for property owners and
                                rental income.
                            </p>
                        </h1>
                        <div class="justify-center space-x-7 flex p-3">
                            <button
                                class="bg-white text-black border-blue-500 border rounded-3xl px-6 py-2 text-lg"
                            >
                                Learn more
                            </button>
                            <button
                                class="border-white text-white border rounded-3xl px-6 py-2 hover:bg-white hover:text-black"
                            >
                                Quote
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-5 grid grid-cols-3">
            <div
                class="bg-local bg-center bg-no-repeat bg-cover h-screen col-span-2 rounded-xl"
                style="background-image: url('/images/workers.jpg')"
            >
                <div class="flex justify-center p-16">
                    <div>
                        <h1 id="heading" class="heading">
                            Public Liability

                            <p id="subheading">
                                Protect your business from third-party claims
                                and risks.
                            </p>
                        </h1>
                        <div class="justify-center space-x-7 flex p-3">
                            <button
                                class="bg-white text-black border-blue-500 border rounded-3xl px-6 py-2 text-lg"
                            >
                                Learn more
                            </button>
                            <button
                                class="border-white text-white border rounded-3xl px-6 py-2 hover:bg-white hover:text-black"
                            >
                                Quote
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <AppFooter></AppFooter>
</template>

<script setup lang="ts">
import AppFooter from "@/Components/UI/AppFooter.vue";
import AppHeader from "@/Components/UI/AppHeader.vue";
import AppHeaderHome from "@/Components/UI/AppHeaderHome.vue";
import { ref, onMounted } from "vue";

function openDropDown(value) {
    open.value = value;
}
function openDropDownStore(value) {
    openStore.value = value;
}
const open = ref(false);
const openStore = ref(false);
console.log(openDropDown);
onMounted(() => {
    const headings = document.querySelectorAll(".heading");
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("fly-in");
                }
            });
        },
        { threshold: 0.1 }
    );

    headings.forEach((heading) => {
        observer.observe(heading);
    });
});
</script>

<style scoped>
#heading {
    font-size: 55px;
    font-weight: bold;
    line-height: 1;
    text-align: center;
}
#subheading {
    font-size: 20px;
    text-align: center;
}
#logo-gradient {
    background: linear-gradient(135deg, #e0e0e0, #3e577e);
}
#logo {
    color: #304975;
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    letter-spacing: 17px;
}

@keyframes flyIn {
    from {
        transform: translateY(-100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.fly-in {
    animation: flyIn 1s ease-out forwards;
}
</style>
