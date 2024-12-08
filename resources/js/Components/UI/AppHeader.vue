<template>
    <nav class="bg-gray-100/90 sticky top-0 w-full left-0 z-50 blur-none">
        <div class="flex items-center justify-center">
            <ul
                class="flex text-xs justify-evenly content-center items-center justify-items-center w-full"
            >
                <div class="flex space-x-2">
                    <img src="/images/logo.png" class="h-16" />
                    <img src="/images/wording.png" class="h-16" />
                </div>
                <!-- <li
                    class="group group-hover:translate-y-36 transition-all duration-1000 ease-in-out group-hover:bg-gray-100 rounded-lg w-full fixed space-x-3 p-12 translate-y-[-100%] group-hover:block delay-150"
                >
                    <ul>
                        <li class="flex">
                            <div class="text-xl font-bold space-y-2 group">
                                <h1
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-700"
                                >
                                    Household Insurance
                                </h1>
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-750"
                                    >LandLord Insurance</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-800"
                                    >Public Liability</a
                                >
                                <a
                                    href="#"
                                    class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in-out delay-900"
                                    >Commercial Insurance</a
                                >
                            </div>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <div
                        href="#"
                        class="hover:text-blue-500 relative group/house z-0"
                    >
                        Our products
                        <div
                            class="group z-0 group-hover/house:translate-y-4 w-screen transition-all duration-1000 ease-in-out group-hover/house:bg-gray-100 rounded-lg fixed space-x-3 p-12 translate-y-[-100%] left-0 group-hover/house:block delay-150 flex justify-between"
                        >
                            <a
                                :href="route('apple.index')"
                                class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in delay-750"
                                >LandLord Insurance</a
                            >
                            <a
                                href="#"
                                class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in delay-800"
                                >Public Liability</a
                            >
                            <a
                                href="#"
                                class="block opacity-0 transition-all group-hover:opacity-100 group-hover:duration-1000 group-hover:ease-in delay-900"
                                >Commercial Insurance</a
                            >
                        </div>
                    </div>
                </li>

                <li class="z-50">
                    <a href="#" class="hover:text-blue-500 "> Claims</a>
                </li>
                <li class="z-50">
                    <a href="#" class="hover:text-blue-500 ">Support</a>
                </li class="z-50">
                <li class="z-50">
                    <a href="#" class="hover:text-blue-500 ">About Us</a>
                </li>
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
                    <button href="#" class="bg-mustard p-3 text-md rounded-xl">
                        Log in
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</template>
