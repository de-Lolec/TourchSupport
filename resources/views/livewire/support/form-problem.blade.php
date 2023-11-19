<div>
    <h1 class="text-4xl">Опишите вашу проблему</h1>

    <div class="mt-5">
        <p class="text-xl text-gray-400">
            У вас проблемы с нашим продуктом?
            Пожалуйста, опишите детали и оставьте ваши контактные данные,
            чтобы мы могли связаться с вами
        </p>
    </div>

    <form wire:submit="save">
        <div class="flex flex-col mt-10">
            <input type="text" class="border-b-2 border-green-600 h-12 outline-none" placeholder="ФИО" wire:model="fio">
            @error('fio') <span class="error text-red-500 text-left mt-2">{{ $message }}</span> @enderror

            <input type="number" class="border-b-2 border-green-600 h-12 outline-none mt-5" placeholder="Телефон" wire:model="phone">
            @error('phone') <span class="error text-red-500 text-left mt-2">{{ $message }}</span> @enderror

            <input type="email" class="border-b-2 border-green-600 h-12 outline-none mt-5" placeholder="Email" wire:model="email">
            @error('email') <span class="error text-red-500 text-left mt-2">{{ $message }}</span> @enderror
        </div>

        <div class="mt-10">
            <p class="text-xl">
                Опишите вашу проблему. Чем больше деталей
                тем легче нам будет в ней разобраться
            </p>
        </div>

        <div class="mt-10">
            <textarea class="w-full h-96 border border-black rounded p-10" wire:model="text">
            </textarea>

            <div class="mt-5">
                @error('text') <span class="error text-red-500 text-left">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-5">
            <p class="text-xl">
                Если у вас есть скрин ошибки, пожалуйста прикрепите его
            </p>
        </div>

        <div class="mt-5">
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-black border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Нажми на область</span> или перетащи картинку</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG или GIF</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" wire:model="file"/>
                </label>
            </div>
        </div>

        <div class="mt-10">
            <button class="bg-green-500 text-white w-full py-4 px-2 hover:bg-green-600" type="submit">
                Submit
            </button>
        </div>

        <div class="flex items-center mt-5">
            <input id="link-checkbox" type="checkbox" value="" class="accent-green-600 border-gray-300 rounded focus:ring-green-200 focus:ring-2" wire:model="checkbox">
            <label for="link-checkbox" class="ms-2 text-sm font-medium text-gray-400">Я даю согласие на обработку <a href="#" class="text-green-600 hover:underline"> персональных данных </a> </label>
        </div>

        <div class="text-left mt-2">
            @error('checkbox') <span class="error text-red-500 mt-5">{{ $message }}</span> @enderror
        </div>

    </form>
</div>
