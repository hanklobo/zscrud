@php
$confirmation = $confirmation ?? [];
$title = $confirmation['title'] ?? '...';
$subtitle = $confirmation['subtitle'] ?? '...';
$route = $confirmation['route'] ?? '#';
$cancel = $confirmation['cancel'] ?? route('dashboard');
@endphp
<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-col items-center pb-10">
        <img class="w-24 h-24 mb-3 mt-3 rounded-full shadow-lg" src="{{'https://img.freepik.com/premium-vector/company-icon-simple-element-illustration-company-concept-symbol-design-can-be-used-web-mobile_159242-7784.jpg'}}" alt="{{$title}}"/>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$title}}</h5>
        <span class="text-sm text-gray-600 dark:text-gray-500">{{$subtitle}}</span>
        <span class="text-base text-red-600 dark:text-red-400">Confirma exclusão?</span>
        <div class="flex mt-4 md:mt-6">
            <form action="{{$route}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Excluir</button>
            </form>
            <a href="{{$cancel}}" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</a>
        </div>
    </div>
</div>
