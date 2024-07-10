<div>
    <div class="py-12 ">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm dark:bg-gray-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if ($aba == "Ver")
                        
                        <livewire:funcionario.equipamento.table>

                    @elseif ($aba == "Adicionar")

                        <livewire:funcionario.equipamento.adicionar-equip>

                    @elseif ($aba == "Alterar")

                        <livewire:funcionario.equipamento.alterar :equipamento="$altEquipamento">

                    @elseif ($aba == "AddProb")
                         
                        <livewire:funcionario.equipamento.adicionar-prob :equipamento_id="$equipamento_id">

                    @endif
                </div>
            </div>

        </div>
    </div>
</div>