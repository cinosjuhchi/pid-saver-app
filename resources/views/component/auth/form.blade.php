        <div class="flex flex-col h-screen justify-center px-6 py-12 lg:px-8 rounded-lg shadow-sm">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2
                    class="text-center text-2xl font-bold leading-9 tracking-tight text-black"
                >
                    Masuk ke <span class="bg-clip-text text-transparent bg-gradient-to-r from-birumuda to-birutua font-black">SaverApp</span>
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="/login" method="POST">
                    @csrf
                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium leading-6 text-black"
                            >Nama Pengguna</label
                        >
                        <div class="mt-2">
                            <input
                                id="nama"
                                name="username"
                                type="nama"
                                autocomplete="nama"
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:outline-none focus:ring-birumuda sm:text-sm sm:leading-6 px-2"
                            />
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label
                                for="password"
                                class="block text-sm font-medium leading-6 text-black"
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
                                class="block w-full px-2 rounded-md border-0 py-1.5 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:outline-none focus:ring-birumuda sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="flex w-full justify-center rounded-md bg-gradient-to-r from-birumuda to-birutua px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-birumuda transition-all  ease-in-out duration-100"
                        >
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="fixed m-3 top-0 right-0 py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
            <p>Nama atau Password yang kamu masukkan salah</p>
            <span class="absolute inset-y-0 right-0 flex items-center mr-4">
                <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
            </span>
        </div>