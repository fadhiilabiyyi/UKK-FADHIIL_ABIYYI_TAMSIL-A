@extends('layout.admin')

@section('main')
<main class="h-full pb-16 overflow-y-auto">
    <div class="w-full mt-10 flex flex-col">
        <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
            <p class="text-center text-xl mt-6">Create new Response</p>
            <form class="flex flex-col pt-3 md:pt-8" action="{{ route('responses.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $complaint->id }}" name="complaint_id">
                <input type="hidden" value="{{ Auth::guard('officer')->user()->id }}" name="officer_id">
                <div class="flex flex-col pt-4">
                    <label for="response" class="text-lg">Isi Tanggapan</label>
                    <input id="response" type="hidden" name="response" required>
                    <trix-editor input="response" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"></trix-editor>
                </div>
                <button type="submit" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 my-8">Kirim Tanggapan</button>
            </form>
        </div>
    </div>
</main>
@endsection
