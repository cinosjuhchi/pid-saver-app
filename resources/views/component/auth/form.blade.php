        <div class="flex flex-col h-screen justify-center px-6 py-12 lg:px-8 rounded-lg shadow-sm">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2
                    class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"
                >
                    Masuk ke SaverApp
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="/login" method="POST">
                    @csrf
                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Nama Pengguna</label
                        >
                        <div class="mt-2">
                            <input
                                id="nama"
                                name="username"
                                type="nama"
                                autocomplete="nama"
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:outline-none focus:ring-blue-600 sm:text-sm sm:leading-6 px-2"
                            />
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label
                                for="password"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Password</label
                            >
                        </div>
                        <div class="mt-2">
                            <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="current-password"
                                required
                                class="block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:outline-none focus:ring-blue-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                        >
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>