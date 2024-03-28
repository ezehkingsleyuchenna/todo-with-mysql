<div>
    <!-- navbar -->
    <nav class="flex justify-between bg-gray-900 text-white">
        <div class="px-5 xl:px-12 py-6 flex w-full justify-between items-center">
            <a class="text-3xl font-bold font-heading" href="{{ route('index') }}">
                TODO
            </a>

            <a class="flex items-center hover:text-gray-200" href="{{ route('logout') }}">
                <x-icons.arrow-right-on-rectangle class="h-6 w-6 hover:text-gray-200" />
            </a>
        </div>
    </nav>

</div>
