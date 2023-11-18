<div>
    <h1 class="text-3xl">Пример заполнение форм</h1>

    <div class="space-y-5 mt-5 text-lg text-left mx-auto w-1/2">
        <p>Иванов Иван Иванович</p>
        <p>+79381010111</p>
        <p>ivan@mail.ru</p>
    </div>

    <div class="border border-black rounded w-1/2 mx-auto mt-5 p-2">
        <ol class="list-decimal text-left pl-10">
            <li>Захожу туда-то</li>
            <li>Нажимаю это</li>
            <li>Выводи вот-это, а должно вот то</li>
        </ol>
    </div>

    <div class="mt-10 mx-auto w-1/2">
        <div class="flex items-center justify-center">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-black border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <input id="dropzone-file" type="file" class="hidden" />
            </label>
        </div>
    </div>

    <div class="mt-10 w-1/2 mx-auto">
        <button class="bg-green-500 text-white w-full py-4 px-2 hover:bg-green-600">
            Submit
        </button>
    </div>

    <div class="flex items-center mt-5 mx-auto w-1/2">
        <input id="link-checkbox" type="checkbox" value="" class="accent-green-600 border-gray-300 rounded focus:ring-green-200 focus:ring-2" checked>
        <label for="link-checkbox" class="ms-2 text-xs font-medium text-gray-400">Я даю согласие на обработку <a href="#" class="text-green-600 hover:underline"> персональных данных </a> </label>
    </div>
</div>
