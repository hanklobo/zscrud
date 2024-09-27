<x-zscrud::layout-system>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New CRUD') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form method="POST" action="{{ route('crud.store-entity') }}">
                @csrf

                <!-- Entity Section -->
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Entity</h3>
                    <div class="mt-4 space-y-4">
                        <div>
                            <x-input-label for="entity_name" :value="__('Entity Name')" />
                            <x-text-input id="entity_name" class="block mt-1 w-full" type="text" name="entity_name" :value="old('entity_name')" required autofocus />
                            <x-input-error :messages="$errors->get('entity_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="table_name" :value="__('Table Name')" />
                            <x-text-input id="table_name" class="block mt-1 w-full" type="text" name="table_name" :value="old('table_name')" required />
                            <x-input-error :messages="$errors->get('table_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label :value="__('Fields')" />
                            <div id="fields-container">
                                <!-- Fields will be added dynamically here -->
                            </div>
                            <button type="button" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" onclick="addField()">
                                {{ __('Add Field') }}
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Requests Section -->
                <div class="mt-6 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Requests</h3>
                    <div id="requests-container" class="mt-4 space-y-4">
                        <!-- Requests will be added dynamically here -->
                    </div>
                    <button type="button" class="mt-2 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600" onclick="addRequest()">
                        {{ __('New Request') }}
                    </button>
                </div>

                <!-- Pages Section -->
                <div class="mt-6 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Pages</h3>
                    <div id="pages-container" class="mt-4 space-y-4">
                        <!-- Pages will be added dynamically here -->
                    </div>
                    <button type="button" class="mt-2 px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600" onclick="addPage()">
                        {{ __('New Page') }}
                    </button>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Create CRUD') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <span class="mt-2 px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600 px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 hidden">
            This CRUD generator will create a new CRUD application based on the information you provide.
        </span>
    </div>

    <script>
        let fieldCount = 0;
        let requestCount = 0;
        let pageCount = 0;

        function addField() {
            const container = document.getElementById('fields-container');
            const fieldDiv = document.createElement('div');
            fieldDiv.className = 'mt-2 p-4 border rounded';
            fieldDiv.innerHTML = `
                <input type="text" name="fields[${fieldCount}][name]" placeholder="Field Name" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <select name="fields[${fieldCount}][type]" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    <option value="checkbox">Checkbox</option>
                    <option value="date">Date</option>
                    <option value="decimal">Decimal</option>
                    <option value="email">Email</option>
                    <option value="number">Number</option>
                    <option value="select">Select</option>
                    <option value="text">Text</option>
                    <option value="textarea">Textarea</option>
                </select>
                <input type="text" name="fields[${fieldCount}][label]" placeholder="Label" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <input type="text" name="fields[${fieldCount}][value]" placeholder="Value" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <textarea name="fields[${fieldCount}][options]" placeholder="Options (JSON format)" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                <select name="fields[${fieldCount}][cast_to]" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="array">Array</option>
                    <option value="boolean">Boolean</option>
                    <option value="collection">Collection</option>
                    <option value="date">Date</option>
                    <option value="datetime">DateTime</option>
                    <option value="double">Double</option>
                    <option value="encrypted">Encrypted</option>
                    <option value="encrypted:array">Encrypted Array</option>
                    <option value="encrypted:collection">Encrypted Collection</option>
                    <option value="encrypted:object">Encrypted Object</option>
                    <option value="float">Float</option>
                    <option value="hashed">Hashed</option>
                    <option value="integer">Integer</option>
                    <option value="object">Object</option>
                    <option value="real">Real</option>
                    <option value="string">String</option>
                    <option value="timestamp">Timestamp</option>
                </select>
                <label><input type="checkbox" name="fields[${fieldCount}][is_fillable]" value="1"> Is Fillable</label>
                <label><input type="checkbox" name="fields[${fieldCount}][is_required]" value="1"> Is Required</label>
                <label><input type="checkbox" name="fields[${fieldCount}][readonly]" value="1"> Readonly</label>
                <button type="button" onclick="this.parentElement.remove()" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Remove</button>
            `;
            container.appendChild(fieldDiv);
            fieldCount++;
        }

        function addRequest() {
            const container = document.getElementById('requests-container');
            const requestDiv = document.createElement('div');
            requestDiv.className = 'mt-2 p-4 border rounded';
            requestDiv.innerHTML = `
                <input type="text" name="requests[${requestCount}][name]" placeholder="Request Name" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <input type="text" name="requests[${requestCount}][permissions]" placeholder="Permissions" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <div id="rules-container-${requestCount}"></div>
                <button type="button" onclick="addRule(${requestCount})" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Add Rule</button>
                <div id="messages-container-${requestCount}"></div>
                <button type="button" onclick="addMessage(${requestCount})" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">Add Message</button>
                <button type="button" onclick="this.parentElement.remove()" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Remove Request</button>
            `;
            container.appendChild(requestDiv);
            requestCount++;
        }

        function addRule(requestIndex) {
            const container = document.getElementById(`rules-container-${requestIndex}`);
            const ruleDiv = document.createElement('div');
            ruleDiv.className = 'mt-2 flex items-center space-x-2';
            ruleDiv.innerHTML = `
                <input type="text" name="requests[${requestIndex}][rules][][key]" placeholder="Rule Key" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <input type="text" name="requests[${requestIndex}][rules][][rules]" placeholder="Rule" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <button type="button" onclick="this.parentElement.remove()" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Remove</button>
            `;
            container.appendChild(ruleDiv);
        }

        function addMessage(requestIndex) {
            const container = document.getElementById(`messages-container-${requestIndex}`);
            const messageDiv = document.createElement('div');
            messageDiv.className = 'mt-2 flex items-center space-x-2';
            messageDiv.innerHTML = `
                <input type="text" name="requests[${requestIndex}][messages][][key]" placeholder="Message Key" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <input type="text" name="requests[${requestIndex}][messages][][message]" placeholder="Message" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <button type="button" onclick="this.parentElement.remove()" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Remove</button>
            `;
            container.appendChild(messageDiv);
        }

        function addPage() {
            const container = document.getElementById('pages-container');
            const pageDiv = document.createElement('div');
            pageDiv.className = 'mt-2 p-4 border rounded';
            pageDiv.innerHTML = `
                <input type="text" name="pages[${pageCount}][name]" placeholder="Page Name" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <input type="text" name="pages[${pageCount}][permissions]" placeholder="Permissions" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <input type="text" name="pages[${pageCount}][request]" placeholder="Request" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <select name="pages[${pageCount}][block]" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    <option value="form.edit-form">Edit Form</option>
                    <option value="form.model-form">Model Form</option>
                    <option value="form.simple-form">Simple Form</option>
                    <option value="list.icons">Icons List</option>
                    <option value="list.table">Table List</option>
                </select>
                <textarea name="pages[${pageCount}][config]" placeholder="Config (JSON format)" class="mb-2 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                <button type="button" onclick="this.parentElement.remove()" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Remove Page</button>
            `;
            container.appendChild(pageDiv);
            pageCount++;
        }
    </script>
</x-zscrud::layout-system>
