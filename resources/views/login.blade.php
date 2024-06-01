@extends('layout.main')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
       <!-- center background -->
       <div class="flex bg-slate-400 w-full h-3/6 border">
        <!-- bg form -->
        <div class="konten bg-slate-100 w-1/4 m-auto md:-mt-20 rounded-3xl h-auto 2xl:h-[632px] 2xl:-mt-12 border-solid border-2 border-slate-600">
            <!-- isi konten -->
            <div class="isi-konten px-4 py-10 2xl:py-32">
               <div class="logo flex m-auto max-w-12 bg-green-400  h-12 rounded">
                    <div class="">
                        <img src="{{ asset('img/logo.svg') }}" alt="" class="h-full w-full">
                    </div>
               </div>

               <!-- header logo -->
               <div class="judul py-2 flex justify-center">
                    <h2>Plan The Plants</h2>
               </div>
               <!-- end header logo -->
               
               <!-- header form -->
               <div class="form-judul py-4 flex justify-center font-bold text-xl">
                    <p>Log In</p>
               </div>
               <!-- end header form -->

               @if(session('error'))
               <div class="">
                    <b>Opps!</b> {{session('error')}}
               </div>
               @endif

               <!-- form -->
               <form class="px-8 pt-6 pb-8 mb-4" method="POST" action="">
                @csrf

                @if(session()->has('loginFailed'))
                    <div class="bg-red-100 border rounded border-red-600 text-red-700 px-4 py-3 relative my-1" role="alert">
                        <strong class="font-bold">{{session('loginFailed')}}</strong>
                    </div>
                @endif

                    <div class="mb-2">
                        <label for="username" class="block font-bold">Username</label>
                        <input type="text" id="username" name="username" class="input shadow-sm border border-gray-300 text-black text-sm rounded-lg block w-full px-3 py-1 my-1 dark:border-gray-600 dark:placeholder-gray-400 focus:outline-none" placeholder="username" />
                        @error('username')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="password" class="block font-bold">Password</label>
                        <input type="password" id="password" name="password" class="input shadow-sm border border-gray-300 text-black text-sm rounded-lg block w-full px-3 py-1 my-1 dark:border-gray-600 dark:placeholder-gray-400 focus:outline-none" placeholder="password" required/>
                        @error('password')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <a href="" class="font-bold text-sm">Forgot Password ?</a>
                    </div>
                    <div class="flex justify-center mt-7">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full w-4/5 2xl:w-2/5">
                            Submit
                        </button>
                    </div>
               </form>
               <!-- end form -->


            </div>
            <!-- end isi konten -->
        </div>
        <!-- end bg form -->
    </div>
    <!-- end center background -->
@endsection