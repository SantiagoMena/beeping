<div class="overflow-x-auto">
    <button wire:click="refresh">Refresh 🔄</button>
    <table class="table-auto min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Order Ref
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Customer Name
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Total Qty
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Total Products
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($orders as $order)
                <tr>
                    <td class="px-6 py-3 text-center text-xs font-medium text-black uppercase tracking-wider">{{ $order->order_ref }}</td>
                    <td class="px-6 py-3 text-center text-xs font-medium text-black uppercase tracking-wider">{{ $order->customer_name }}</td>
                    <td class="px-6 py-3 text-center text-xs font-medium text-black uppercase tracking-wider">{{ $order->total_qty }}</td>
                    <td class="px-6 py-3 text-center text-xs font-medium text-black uppercase tracking-wider">{{ $order->total_products }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
