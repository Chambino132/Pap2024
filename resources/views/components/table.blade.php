<div class="py-8 ">

    <div class=" bg-white dark:bg-gray-300 rounded-lg shadow-lg">
        <table class="w-full table-auto">
                <thead class="text-white bg-red-500 shadow-lg dark:bg-red-700">

                    <tr>
                        <th class="px-4 py-3 text-left">Project name</th>
                        <th class="px-4 py-3 text-left">Contact person</th>
                        <th class="px-4 py-3 text-left">Project lead</th>
                        <th class="px-4 py-3 text-left">Deadline</th>

                        <th class="w-1/12 px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-gray-900 dark:text-slate-900">

                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-3">
                            Rachel
                        </td>
                        <td class="px-4 py-3">Mike wazowski</td>
                        <td class="px-4 py-3">Mike Dawson</td>
                        <td class="px-4 py-3">

                            <span class="px-4 py-2 text-gray-600 dark:text-gray-800 bg-gray-200 dark:bg-gray-400 rounded-lg">12 days left</span>
                        </td>
                        
                        <td class="px-4 py-3 text-center">
                            <x-dropdown-table>
                                <x-slot name="trigger">
                                    <button class="p-1 px-2 font-bold rounded-lg hover:bg-gray-300 focus:outline-none">&#8943;</button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link-table>

                                    </x-dropdown-link-table>
                                </x-slot>
                            </x-dropdown-table>
                            

                        </td>
                    </tr>
                    
                </tbody>
        </table>
    </div>
</div>