<table id="tbl-outlet" class="table table-bordered table-hover mt-3">
    <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Product Brand</th>
            <th class="text-center">Quantity</th>
            <th class="text-center">Condition</th>
            <th class="text-center">Restock Date</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inventory as $in)
            <tr>
                <td class="text-center">{{ $i = isset($i) ? ++$i : ($i = 1) }}</td>
                <td class="text-center">{{ $in->product_name }}</td>
                <td class="text-center">{{ $in->product_brand }}</td>
                <td class="text-center">{{ $in->quantity }}</td>
                <td class="text-center">{{ $in->condition }}</td>
                <td class="text-center">{{ $in->restock_date }}</td>
                <td class="text-center">
                    @include('inventory.update')
                    <form method="POST" action="{{ route('inventory.destroy', $in->id) }}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn delete-member btn-danger"><i class="fas fa-trash-alt"
                                style="color:reda"></i></button> &nbsp;
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
