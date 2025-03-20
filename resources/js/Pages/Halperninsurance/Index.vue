<template>
    <AppHeader
        :can-login="canLogin"
        :can-register="canRegister"
        @mouseenter="openDropDown(true), console.log(open)"
        @mouseleave="openDropDown(false), console.log(open)"
        :class="{
            'bg-blue-100/100': open,
        }"
    ></AppHeader>
    <a :href="route('admin.home')">admin</a><br />
    <a :href="route('uinsure-quote.index')">api</a>
    <body
        :class="{
            'transition-all ease-in-out duration-300 blur-lg delay-300': open,
            'transition-all ease-in-out duration-300 delay-300': !open,
        }"
    >
        <div class="p-3 z-0">
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
                class="bg-local bg-center bg-no-repeat bg-cover h-screen rounded-xl shadow-inside"
                style="background-image: url('images/Home.jpg')"
            >
                <div class="justify-center p-10 flex">
                    <div class="p-3 rounded-lg mb-80 grid grid-cols-3">
                        <div>
                            <h1 id="heading" class="heading">
                                Home Insurance
                                <p id="subheading" class="">
                                    Safeguard your home and belongings with
                                    comprehensive cover.
                                </p>
                            </h1>
                            <p
                                class="font-serif text-xxs md:text-md lg:text-xl backdrop-blur p-3"
                            >
                                At Halpern Insurance, we offer home insurance
                                that protects your property, belongings, and
                                personal liability against risks like fire,
                                theft, and natural disasters. Our policies are
                                tailored to meet your needs, covering everything
                                from your home's structure to your personal
                                possessions. We also offer liability coverage,
                                protecting you if accidents occur on your
                                property. With flexible options and competitive
                                rates, we ensure your home is secure in any
                                situation. Our goal is to provide peace of mind
                                so you can focus on what matters. Trust Halpern
                                Insurance to keep your home protected.
                            </p>
                        </div>
                    </div>
                    <div class="relative">
                        <div
                            class="absolute bottom-44 -left-44 animate-bounce w-16 h-16"
                        >
                            <a
                                :href="route('quotes.index')"
                                class="border-white text-white border-2 font-serif text-3xl rounded-3xl px-7 py-2 hover:bg-white hover:text-black"
                            >
                                Quote
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-5">
            <div
                class="bg-local bg-center bg-no-repeat bg-cover h-screen col-span-2 rounded-xl"
                style="background-image: url('images/commercial.jpg')"
            >
                <div class="justify-center p-10 flex">
                    <div class="p-3 rounded-lg mb-80 grid grid-cols-3">
                        <div></div>
                        <div></div>
                        <div>
                            <h1 id="heading" class="heading text-white">
                                Commercial insurance
                                <p id="subheading" class="text-white">
                                    Secure your business with flexible and
                                    reliable coverage.
                                </p>
                            </h1>
                            <p
                                class="font-serif text-white text-xxs md:text-md lg:text-xl backdrop-blur p-3"
                            >
                                Halpern Insurance offers commercial insurance
                                tailored to protect your business from property
                                damage, liability claims, and operational
                                disruptions. We cover everything from equipment
                                loss to employee injuries and business
                                interruption. Our policies are customized for
                                your industry, ensuring you have the right
                                coverage. We also offer professional liability
                                protection for businesses offering services.
                                With flexible packages and competitive rates, we
                                help businesses of all sizes manage risk. Let
                                Halpern Insurance protect your business, so you
                                can focus on growth.
                            </p>
                        </div>
                    </div>
                    <div class="relative">
                        <div
                            class="absolute bottom-44 -left-44 animate-bounce w-16 h-16"
                        >
                            <a
                                :href="route('quotes.index')"
                                class="border-white text-white border-2 font-serif text-3xl rounded-3xl px-7 py-2 hover:bg-white hover:text-black"
                            >
                                Quote
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-5">
            <div
                class="bg-local bg-center bg-no-repeat bg-cover h-screen rounded-xl"
                style="background-image: url('images/terraced.jpg')"
            >
                <div class="justify-center p-10 flex">
                    <div class="p-3 rounded-lg mb-80">
                        <div>
                            <h1 id="heading" class="heading text-white">
                                Landlords insurance
                                <p id="subheading" class="text-white">
                                    Tailored protection for property owners and
                                    rental income.
                                </p>
                            </h1>
                            <p
                                class="font-serif text-white text-xxs md:text-md lg:text-xl backdrop-blur p-3"
                            >
                                Our landlord insurance is designed to protect
                                rental property owners against risks such as
                                property damage, tenant-related issues, and loss
                                of rent. We offer customized coverage for both
                                residential and commercial properties, ensuring
                                you're financially protected. Our policies also
                                cover legal expenses related to tenant disputes
                                and eviction. Additionally, we provide loss of
                                rent protection and contents coverage for
                                furnished properties. With flexible options and
                                expert support, we ensure landlords are covered
                                in every situation. Trust Halpern Insurance to
                                safeguard your rental investments.
                            </p>
                        </div>
                    </div>
                    <div class="relative">
                        <div
                            class="absolute -bottom-32 -left-44 animate-bounce w-16 h-16"
                        >
                            <a
                                :href="route('quotes.index')"
                                class="border-white text-white border-2 font-serif text-3xl rounded-3xl px-7 py-2 hover:bg-white hover:text-black"
                            >
                                Quote
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-5">
            <div
                class="bg-local bg-center bg-no-repeat bg-cover h-screen rounded-xl"
                style="background-image: url('/images/workers.jpg')"
            >
                <div class="justify-center p-10 flex">
                    <div class="p-3 rounded-lgc grid grid-rows-2">
                        <div>
                            <div>
                                <h1 id="heading" class="heading">
                                    Public Liability

                                    <p id="subheading">
                                        Protect your business from third-party
                                        claims and risks.
                                    </p>
                                </h1>
                                <p
                                    class="font-serif text-xxs md:text-md lg:text-xl p-3"
                                >
                                    At Halpern Insurance, we offer home
                                    insurance that protects your property,
                                    belongings, and personal liability against
                                    risks like fire, theft, and natural
                                    disasters. Our policies are tailored to meet
                                    your needs, covering everything from your
                                    home's structure to your personal
                                    possessions. We also offer liability
                                    coverage, protecting you if accidents occur
                                    on your property. With flexible options and
                                    competitive rates, we ensure your home is
                                    secure in any situation. Our goal is to
                                    provide peace of mind so you can focus on
                                    what matters. Trust Halpern Insurance to
                                    keep your home protected.
                                </p>
                            </div>
                        </div>
                        <div class="relative">
                            <div
                                class="absolute bottom-40 right-44 animate-bounce w-16 h-16"
                            >
                                <a
                                    :href="route('quotes.index')"
                                    class="border-white text-white border-2 font-serif text-3xl rounded-3xl px-7 py-2 hover:bg-white hover:text-black"
                                >
                                    Quote
                                </a>
                            </div>
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

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});

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
/* .shadow-inside {
    box-shadow: inset 10px 10px 10px 10px rgba(0, 0, 0, 0.5);
} */
</style>
