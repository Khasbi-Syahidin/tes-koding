<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>







    <div
        class="px-4 mx-auto bg-gray-100 rounded-lg md:my-8 xl:my-10 sm:mt-0 md:px-8 py-6 md:w-1/2 w-full sm:border-r border-gray-500 shadow-2xl">


        <div class="container">
            <div class="w-full flex items-center justify-center">
                <div
                    class="w-full flex flex-col items-center py-16 md:py-12 bg-gradient-to-r from-indigo-700 to-purple-500 rounded-lg">
                    <div class="w-full flex items-center justify-center">
                        <div class="flex flex-col items-center">
                            <a href={{ route('user.edit') }}>
                                <div class="rounded w-20">
                                    @if (auth()->user() && auth()->user()->image == '')
                                        <img src="data:image/png;base64,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"
                                            alt="profile"
                                            class="object-center object-cover w-full h-full rounded-full aspect-square" />
                                    @else
                                        <img src="{{ auth()->user()->image }}" alt="profile"
                                            class="object-center object-cover w-full h-full rounded-full aspect-square" />
                                    @endif
                                </div>
                            </a>
                            <p class="mt-3 text-sm lg:text-xl md:text-base font-semibold text-center text-white">
                                {{ $user->name }}
                            </p>
                            <p class="text-xs sm:text-xs md:text-sm text-center text-white">
                                {{-- {auth.user.email} --}}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="mt-9">
            <p class="text-base xl:text-xl md:text-xl font-medium leading-none text-gray-700 whitespace-nowrap">
                Transaksi Kamu
            </p>
            <div class="w-full bg-gray-200 rounded-full h-1 mt-4">
                <div class="bg-green w-3/4 rounded-full h-1">
                </div>
            </div>

            <div class="mt-8 bg-slate-300 p-4 rounded-lg">
                <p class="text-sm sm:text-base lg:text-xl font-medium leading-none text-gray-700">Kamu belum memiliki riwayat transaksi</p>
            </div>
            @foreach ($dataSewas as $sewa)
                <div class="mt-8 bg-slate-300 p-5 rounded-lg">
                    <div class="sm:flex justify-between items-end">
                        <div class="w-full">
                            <p
                                class="text-sm sm:text-base lg:text-xl font-medium leading-none text-gray-700 mb-1 md:mb-2">
                                Merk : {{ $sewa['merk'] }}
                            </p>
                            <div class="text-end flex mb-3">
                                <p class="text-sm leading-none text-gray-600">
                                    Model : {{ $sewa['model'] }}
                                </p>
                            </div>
                            <div class="flex flex-col gap-4 md:flex-row justify-between">
                                <div class="flex flex-row">
                                    <div class="flex justify-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="#52525B"
                                            class="m-auto" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13 12l-.688-4h-.609l-.703 4c-.596.347-1 .984-1 1.723 0 1.104.896 2 2 2s2-.896 2-2c0-.739-.404-1.376-1-1.723zm-1-8c-5.522 0-10 4.477-10 10s4.478 10 10 10 10-4.477 10-10-4.478-10-10-10zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm-2-19.819v-2.181h4v2.181c-1.438-.243-2.592-.238-4 0zm9.179 2.226l1.407-1.407 1.414 1.414-1.321 1.321c-.462-.484-.964-.926-1.5-1.328zm-12.679 9.593c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm12 0c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm-6 6c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm-4-2c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm8 0c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm-8-9c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm8 0c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5z"
                                                stroke="#52525B" strokeWidth="1.25" strokeLinecap="round"
                                                strokeLinejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="text-end flex my-auto">
                                        <p class="text-xs text-start leading-none text-gray-600 ml-2">
                                            Tanggal Awal Pinjam <br />
                                            <span class="text-sm leading-none">
                                                {{ $sewa['awal_sewa'] }}
                                            </span>
                                        </p>

                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="flex justify-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="#52525B"
                                            class="m-auto" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13 12l-.688-4h-.609l-.703 4c-.596.347-1 .984-1 1.723 0 1.104.896 2 2 2s2-.896 2-2c0-.739-.404-1.376-1-1.723zm-1-8c-5.522 0-10 4.477-10 10s4.478 10 10 10 10-4.477 10-10-4.478-10-10-10zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8zm-2-19.819v-2.181h4v2.181c-1.438-.243-2.592-.238-4 0zm9.179 2.226l1.407-1.407 1.414 1.414-1.321 1.321c-.462-.484-.964-.926-1.5-1.328zm-12.679 9.593c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm12 0c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm-6 6c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm-4-2c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm8 0c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm-8-9c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5zm8 0c0 .276-.224.5-.5.5s-.5-.224-.5-.5.224-.5.5-.5.5.224.5.5z"
                                                stroke="#52525B" strokeWidth="1.25" strokeLinecap="round"
                                                strokeLinejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="text-end flex my-auto">
                                        <p class="text-xs text-start leading-none text-gray-600 ml-2">
                                            Tanggal Akhir Pinjam <br />
                                            <span class="text-sm leading-none">
                                                {{ $sewa['akhir_sewa'] }}
                                            </span>
                                        </p>

                                    </div>
                                </div>
                                <div class="lg:text-end lg:mb-8 flex flex-col">
                                    <p class="text-xs text-start leading-none text-gray-600 ml-2 mb-2">
                                        Status :

                                    </p>
                                    <button
                                        class="mt-4 sm:mt-0 focus:outline-none px-5 py-2 rounded text-xs leading-none hover:bg-red-100 bg-red-50">
                                        {{ $sewa['status'] }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex lg:gap-7 md:gap-3 gap-0 items-center justify-between mt-9">
            <button  class="w-full py-3 bg-gray-400 hover:bg-gray-500 shadow rounded text-sm text-white">
                <a href="{{ route('home') }}">
                    Kembali
                </a>
            </button>
            @if ( auth()->user()->role == 1 )

            <button class="w-full py-3 bg-indigo-700 hover:bg-opacity-80 shadow rounded text-sm text-white">
                <a href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </button>
            @else

            <button class="w-full py-3 bg-indigo-700 hover:bg-opacity-80 shadow rounded text-sm text-white">
                <a href="{{ route('user.edit') }}">
                    Update Profile
                </a>
            </button>
            @endif
            <button class="w-full py-3 bg-red-700 hover:bg-opacity-80 shadow rounded text-sm text-white">
                <a href="{{ route('logout') }}" method="post" as="button">
                    Logout
                </a>
            </button>
        </div>
    </div>

    </div>
</body>

</html>
