@extends('home')
@section('content')
    <div class="p-10">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
        <i><img src="/images/apps.png" alt="App Icon" width="32" height="32"></i>

            <h1 class="text-5xl font-semibold">Smart Home</h1>
            <i class="fa fa-plus-circle text-4xl" aria-hidden="true"></i>
        </div>

        <!-- Status Indicators -->
        <div class="flex justify-around mb-4 bg-custom">
            <div class="flex items-center p-4 rounded-lg">
                <i class="fas fa-tint text-blue-500 text-6xl p-6"></i>
                <span class="text-4xl">75%</span>
            </div>
            <div class="flex items-center p-4 rounded-lg">
                <i class="fas fa-thermometer-half text-yellow-500 text-6xl p-6"></i>
                <span class="text-4xl">27°C</span>
            </div>
            <div class="flex items-center p-4 rounded-lg">
                <i class="fas fa-bolt text-red-500 text-6xl p-6"></i>
                <span class="text-4xl">55kWh</span>
            </div>
        </div>

        <!-- Rooms -->
        <div class="mb-4">
    <div class="flex justify-between items-center mb-6 mt-8">
        <h2 class="text-4xl font-semibold">Rooms</h2>
        <i class="fas fa-ellipsis-v text-4xl text-gray-400 mr-6"></i> <!-- Icon ba chấm -->
    </div>
    <div class="flex space-x-4 overflow-x-auto whitespace-nowrap">
        <div class="flex-1 bg-blue-600 p-10 rounded-xl flex items-center justify-between min-w-[400px]">
            <div>
                <h3 class="text-4xl font-semibold mb-3">Living Room</h3>
                <p class="text-3xl">3 devices</p>
            </div>
            <i class="fas fa-tv text-4xl"></i>
        </div>
        <div class="flex-1 bg-gray-800 p-10 rounded-xl flex items-center justify-between min-w-[400px]">
            <div>
                <h3 class="text-4xl font-semibold mb-3">Bedroom</h3>
                <p class="text-3xl">4 devices</p>
            </div>
            <i class="fas fa-bed text-4xl"></i>
        </div>
        <div class="flex-1 bg-gray-800 p-10 rounded-xl flex items-center justify-between min-w-[400px]">
            <div>
                <h3 class="text-4xl font-semibold mb-3">Kitchen</h3>
                <p class="text-3xl">2 devices</p>
            </div>
            <i class="fas fa-utensils text-4xl"></i>
        </div>
    </div>
</div>



        <!-- Gauge -->
        <div class="mb-4">
            <div class="relative w-full h-90vh flex items-center justify-center">
                <div class="absolute w-96 h-96 rounded-full border-4 border-gray-700"></div>
                <div class="absolute w-64 h-64 rounded-full border-4 border-gray-800"></div>
                <div class="absolute w-48 h-48 rounded-full border-4 border-gray-900"></div>
                <div class="absolute text-center">
                    <span class="text-2xl font-semibold">0%</span>
                </div>
                <div class="absolute w-2 h-2 bg-white rounded-full" style="transform: rotate(0deg) translate(80px);"></div>
            </div>
        </div>

        <!-- Lights -->
        <div class="mb-4">
    <div class="flex justify-between items-center mb-2">
        <div>
            <h2 class="text-4xl font-semibold mb-1">Lights</h2>
            <p class="text-2xl opacity-50">3 devices</p>
        </div>
        <i class="fas fa-ellipsis-v text-3xl text-gray-400 mr-6"></i> <!-- Thêm icon 3 chấm -->
    </div>
    <div class="flex space-x-4">
        <div class="flex-1 bg-gray-800 p-6 rounded-lg flex flex-col items-center">
            <h3 class="text-3xl font-semibold mb-4">Overhead</h3>
            <div class="relative inline-block w-20 mr-2 align-middle select-none transition duration-200 ease-in">
                <input type="checkbox" name="toggle" id="toggle1"
                    class="toggle-checkbox absolute block w-12 h-12 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                <label for="toggle1"
                    class="toggle-label block overflow-hidden h-12 rounded-full bg-gray-600 cursor-pointer "></label>
            </div>
            <span class="text-2xl mt-4">Off</span>
        </div>
        <div class="flex-1 bg-gray-800 p-6 rounded-lg flex flex-col items-center">
            <h3 class="text-3xl font-semibold mb-4">Lamp</h3>
            <div class="relative inline-block w-20 mr-2 align-middle select-none transition duration-200 ease-in">
                <input type="checkbox" name="toggle" id="toggle2"
                    class="toggle-checkbox absolute block w-12 h-12 rounded-full bg-white border-4 appearance-none cursor-pointer"
                    checked />
                <label for="toggle2"
                    class="toggle-label block overflow-hidden h-12 rounded-full bg-blue-600 cursor-pointer "></label>
            </div>
            <span class="text-2xl mt-4">On</span>
        </div>
        <div class="flex-1 bg-gray-800 p-6 rounded-lg flex flex-col items-center">
            <h3 class="text-3xl font-semibold mb-4">Pendant</h3>
            <div class="relative inline-block w-20 mr-2 align-middle select-none transition duration-200 ease-in">
                <input type="checkbox" name="toggle" id="toggle3"
                    class="toggle-checkbox absolute block w-12 h-12 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                <label for="toggle3"
                    class="toggle-label block overflow-hidden h-12 rounded-full bg-gray-600 cursor-pointer "></label>
            </div>
            <span class="text-2xl mt-4">Off</span>
        </div>
    </div>
</div>


        
        

        <!-- Navigation -->
        <div class="fixed bottom-0 left-0 right-0 bg-gray-800 p-4 flex justify-around">
    <div class="flex flex-col items-center">
        <i class="fas fa-home text-6xl text-white"></i>
        <span class="text-2xl text-white">Home</span>
    </div>
    <div class="flex flex-col items-center">
        <i class="fas fa-chart-bar text-6xl text-white"></i>
        <span class="text-2xl text-white">Stats</span>
    </div>
    
    <!-- Mic Icon -->
    <div id="voice" class="relative">
        <div class="voice bg-blue-500 rounded-full flex items-center justify-center">
            <i class="fas fa-microphone text-6xl text-white"></i>
        </div>
    </div>

    <div class="flex flex-col items-center">
        <i class="fas fa-bell text-6xl text-white"></i>
        <span class="text-2xl text-white">Alerts</span>
    </div>
    <div class="flex flex-col items-center">
        <i class="fas fa-cog text-6xl text-white"></i>
        <span class="text-2xl text-white">Settings</span>
    </div>
</div>

@endsection
