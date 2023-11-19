<div>
    <div class="container mx-auto text-center">
        <div class="mx-auto">
            <h1 class="text-4xl max-[375px]:p-5">
                <span class="text-green-600">Чат</span> с сотрудником
            </h1>
        </div>

        <div class="flex flex-row max-[1150px]:flex-col">
            <div class="w-1/2 p-2 mt-10 max-[1150px]:mx-auto max-lg:w-full">
                <!-- Component Start -->
                <div class="flex flex-col flex-grow w-full max-w-xl bg-white shadow-xl rounded-lg overflow-hidden text-white max-lg:mx-auto">
                    <div class="flex flex-col flex-grow p-4 overflow-auto h-1/2">
                        <div class="flex w-full mt-2 space-x-3 max-w-xs">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-600"></div>
                            <div>
                                <div class="bg-green-600 p-3 rounded-r-lg rounded-bl-lg">
                                    <p class="text-sm">
                                        <p class="font-bold">Ваша заявка создана</p>
                                        <p>Ваш номер - {{$ticket->phone}}</p>
                                        <p>Дата создания - {{$ticket->created_at}}</p>
                                    </p>
                                </div>
                                <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                            </div>
                        </div>
                        <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                            <div>
                                <div class="bg-green-500 text-white p-3 rounded-l-lg rounded-br-lg">
                                    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                                </div>
                                <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                            </div>
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-600"></div>
                        </div>
                        <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                            <div>
                                <div class="bg-green-500 text-white p-3 rounded-l-lg rounded-br-lg">
                                    <p class="text-sm">Lorem ipsum dolor sit amet.</p>
                                </div>
                                <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                            </div>
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-600"></div>
                        </div>
                        <div class="flex w-full mt-2 space-x-3 max-w-xs">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-600"></div>
                            <div>
                                <div class="bg-green-600 p-3 rounded-r-lg rounded-bl-lg">
                                    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                                <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                            </div>
                        </div>
                        <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                            <div>
                                <div class="bg-green-500 text-white p-3 rounded-l-lg rounded-br-lg">
                                    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                                <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                            </div>
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-600"></div>
                        </div>
                        <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
                            <div>
                                <div class="bg-green-500 text-white p-3 rounded-l-lg rounded-br-lg">
                                    <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                </div>
                                <span class="text-xs text-gray-500 leading-none">2 min ago</span>
                            </div>
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-600"></div>
                        </div>
                    </div>

                    <div class="bg-green-600 p-4 text-black">
                        <input class="flex items-center h-10 w-full rounded px-3 text-sm outline-none" type="text" placeholder="Введите ваше сообщение...">
                    </div>
                </div>
                <!-- Component End  -->
            </div>

            <div class="w-1/2 p-2 mt-10 max-[1150px]:mx-auto max-lg:w-full">
                <div class="text-left text-xl max-lg:text-center">
                    <p>
                        С вами работает сотрудник - <span class="font-bold">Мистер Кот</span>, специалист по деньгам. Он уже получил детали вашей заявки и ознакомился с ними.
                    </p>
                </div>

                <div class="text-left text-xl mt-20 max-lg:text-lg max-[425]:mt-5">
                    <p>Его показаетли: </p>

                    <div class="grid grid-cols-2 gap-5 mt-5">
                        <div>
                            <svg width="140" height="28" viewBox="0 0 140 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_32_648)">
                                    <path d="M14 5L16.781 10.9243L23 11.8801L18.5 16.489L19.562 23L14 19.9243L8.438 23L9.5 16.489L5 11.8801L11.219 10.9243L14 5Z" stroke="#FFCF5C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M42 5L44.781 10.9243L51 11.8801L46.5 16.489L47.562 23L42 19.9243L36.438 23L37.5 16.489L33 11.8801L39.219 10.9243L42 5Z" stroke="#FFCF5C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M70 5L72.781 10.9243L79 11.8801L74.5 16.489L75.562 23L70 19.9243L64.438 23L65.5 16.489L61 11.8801L67.219 10.9243L70 5Z" stroke="#FFCF5C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M98 5L100.781 10.9243L107 11.8801L102.5 16.489L103.562 23L98 19.9243L92.438 23L93.5 16.489L89 11.8801L95.219 10.9243L98 5Z" stroke="#FFCF5C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M126 5L128.781 10.9243L135 11.8801L130.5 16.489L131.562 23L126 19.9243L120.438 23L121.5 16.489L117 11.8801L123.219 10.9243L126 5Z" stroke="#FFCF5C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_32_648">
                                        <rect width="140" height="28" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>

                        <div>
                            <p>оценка пользователей</p>
                        </div>

                        <div>
                            <p>2 минуты</p>
                        </div>

                        <div>
                            <p>среднее время ответа</p>
                        </div>

                        <div>
                            <p>8642</p>
                        </div>

                        <div>
                            <p>количество обработанных заявок</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
