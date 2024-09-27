<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body >

    <div class="bg-gray-900 text-white flex min-h-screen flex-col items-center pt-16 sm:justify-center sm:pt-0">
        <a href="#">
            <div class="text-foreground font-semibold text-2xl tracking-tighter mx-auto flex items-center gap-2">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672Zm-7.518-.267A8.25 8.25 0 1 1 20.25 10.5M8.288 14.212A5.25 5.25 0 1 1 17.25 10.5"></path>
                    </svg>
                </div>
                SmartHome
            </div>
        </a>
        <div class="relative mt-12 w-full max-w-lg sm:mt-10">
            <div class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-sky-300 to-transparent" bis_skin_checked="1"></div>
            <div class="mx-5 border dark:border-b-white/50 dark:border-t-white/50 border-b-white/20 sm:border-t-white/20 shadow-[20px_0_20px_20px] shadow-slate-500/10 dark:shadow-white/20 rounded-lg border-white/20 border-l-white/20 border-r-white/20 sm:shadow-sm lg:rounded-xl lg:shadow-none">
                <div class="flex flex-col p-6">
                    <h3 class="text-xl font-semibold leading-6 tracking-tighter">Đăng nhập</h3>
                    <p class="mt-1.5 text-sm font-medium text-white/50">Welcome back, enter your credentials to
                        continue.
                    </p>
                </div>
                <div class="p-6 pt-0">
                    <form action="{{route('auth.login.veriry')}}" method="post" >
                        @csrf
                        <div>
                            <div>
                                <div class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30">
                                    <div class="flex justify-between">
                                        <label class="text-xs font-medium text-muted-foreground group-focus-within:text-white text-gray-400">Tên đăng nhập</label>
                                        <div class="absolute right-3 translate-y-2 text-green-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <input type="text" name="userName" placeholder="Tên Đăng nhập" autocomplete="off" class="block w-full border-0 bg-transparent p-0 text-sm file:my-1 file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2 file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0 sm:leading-7 text-foreground">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div>
                                <div class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30">
                                    <div class="flex justify-between">
                                        <label class="text-xs font-medium text-muted-foreground group-focus-within:text-white text-gray-400">Mật khẩu</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="password" name="password" class="block w-full border-0 bg-transparent p-0 text-sm file:my-1 placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0 focus:ring-teal-500 sm:leading-7 text-foreground">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="remember" class="outline-none focus:outline focus:outline-sky-300">
                                <span class="text-xs">Remember me</span>
                            </label>
                            <a class="text-sm font-medium text-foreground underline" href="/forgot-password">Forgot
                                password?</a>
                        </div>
                        <div class="mt-4 flex items-center justify-end gap-x-2">
                            <a class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:ring hover:ring-white h-10 px-4 py-2 duration-200" href="/register">Register</a>
                            <button class="font-semibold hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black h-10 px-4 py-2" type="submit">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>