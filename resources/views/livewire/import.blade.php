<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel 8 Import Export Excel to database Example - ItSolutionStuff.com
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button wire:click="import" class="btn btn-success">Import User Data</button>
                <a wire:click="hideModalImport" class="btn btn-warning">close</a>
            </form>
        </div>
    </div>
</div>