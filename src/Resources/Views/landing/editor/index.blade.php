<x-zscrud::layout-system>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Landing Page Editor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @if (session('message') !== null)
                    <p x-data="{ show: true }"
                       x-show="show"
                       x-transition
                       x-init="setTimeout(() => show = false, 6000)"
                       class="text-base text-green-600 dark:text-green-400"
                    >{{ __(session('message')) }}</p>
                @endif
                <div class="max-w-full">
                    <x-zscrud::landing-page-form-editor
                        :blocks="$blocks"
                        :cssUrls="[
                            'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css',
                            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css',
                            asset('landing-page.css')
                        ]"
                   />
                </div>
            </div>
        </div>
    </div>
</x-zscrud::layout-system>
