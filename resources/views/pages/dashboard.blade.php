@extends('home')
@section('content')
    <div class="p-4">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <i class="fas fa-bars text-xl"></i>
            <h1 class="text-xl font-semibold">Smart Home</h1>
            <i class="fas fa-plus text-xl"></i>
        </div>

        <!-- Status Indicators -->
        <div class="flex justify-around mb-4">
            <div class="flex flex-col items-center bg-gray-800 p-2 rounded-lg">
                <i class="fas fa-tint text-blue-500 text-2xl"></i>
                <span class="text-sm">75%</span>
            </div>
            <div class="flex flex-col items-center bg-gray-800 p-2 rounded-lg">
                <i class="fas fa-thermometer-half text-yellow-500 text-2xl"></i>
                <span class="text-sm">27°C</span>
            </div>
            <div class="flex flex-col items-center bg-gray-800 p-2 rounded-lg">
                <i class="fas fa-bolt text-red-500 text-2xl"></i>
                <span class="text-sm">55kWh</span>
            </div>
        </div>

        <!-- Rooms -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2">Rooms</h2>
            <div class="flex space-x-2">
                <div class="flex-1 bg-blue-600 p-4 rounded-lg flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-semibold">Living Room</h3>
                        <p class="text-xs">3 devices</p>
                    </div>
                    <i class="fas fa-tv text-xl"></i>
                </div>
                <div class="flex-1 bg-gray-800 p-4 rounded-lg flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-semibold">Bedroom</h3>
                        <p class="text-xs">4 devices</p>
                    </div>
                    <i class="fas fa-bed text-xl"></i>
                </div>
                <div class="flex-1 bg-gray-800 p-4 rounded-lg flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-semibold">Kitchen</h3>
                        <p class="text-xs">2 devices</p>
                    </div>
                    <i class="fas fa-utensils text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Gauge -->
        <div class="mb-4">
            <div class="relative w-full h-48 flex items-center justify-center">
                <div class="absolute w-40 h-40 rounded-full border-4 border-gray-700"></div>
                <div class="absolute w-32 h-32 rounded-full border-4 border-gray-800"></div>
                <div class="absolute w-24 h-24 rounded-full border-4 border-gray-900"></div>
                <div class="absolute text-center">
                    <span class="text-2xl font-semibold">0%</span>
                </div>
                <div class="absolute w-2 h-2 bg-white rounded-full" style="transform: rotate(0deg) translate(80px);"></div>
            </div>
        </div>

        <!-- Lights -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2">Lights</h2>
            <div class="flex space-x-2">
                <div class="flex-1 bg-gray-800 p-4 rounded-lg flex flex-col items-center">
                    <h3 class="text-sm font-semibold mb-2">Overhead</h3>
                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="toggle" id="toggle1"
                            class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                        <label for="toggle1"
                            class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-600 cursor-pointer"></label>
                    </div>
                    <span class="text-xs">Off</span>
                </div>
                <div class="flex-1 bg-gray-800 p-4 rounded-lg flex flex-col items-center">
                    <h3 class="text-sm font-semibold mb-2">Lamp</h3>
                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="toggle" id="toggle2"
                            class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"
                            checked />
                        <label for="toggle2"
                            class="toggle-label block overflow-hidden h-6 rounded-full bg-blue-600 cursor-pointer"></label>
                    </div>
                    <span class="text-xs">On</span>
                </div>
                <div class="flex-1 bg-gray-800 p-4 rounded-lg flex flex-col items-center">
                    <h3 class="text-sm font-semibold mb-2">Pendant</h3>
                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="toggle" id="toggle3"
                            class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                        <label for="toggle3"
                            class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-600 cursor-pointer"></label>
                    </div>
                    <span class="text-xs">Off</span>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="fixed bottom-0 left-0 right-0 bg-gray-800 p-4 flex justify-around">
            <div class="flex flex-col items-center">
                <i class="fas fa-home text-xl"></i>
                <span class="text-xs">Home</span>
            </div>
            <div class="flex flex-col items-center">
                <i class="fas fa-chart-bar text-xl"></i>
                <span class="text-xs">Stats</span>
            </div>
            <div class="flex flex-col items-center">
                <i class="fas fa-microphone text-xl text-blue-500"></i>
                <span class="text-xs">Voice</span>
            </div>
            <div class="flex flex-col items-center">
                <i class="fas fa-bell text-xl"></i>
                <span class="text-xs">Alerts</span>
            </div>
            <div class="flex flex-col items-center">
                <i class="fas fa-cog text-xl"></i>
                <span class="text-xs">Settings</span>
            </div>
        </div>
    </div>
@endsection
