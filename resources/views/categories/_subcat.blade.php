<li class="dd-item dd-nodrag">
    <div class="dd-handle">
        {{ $category->title }} <span class="badge badge-danger">{{ $category->member_count }}</span>
        <div class="pull-right action-buttons">
            <a class="blue" href="/staff/categories/{{ $category->id }}/members">
                <span class="label label-success">
                     <i class="fa fa-cloud-download" aria-hidden="true"></i>
                    List Members
				</span>
            </a>

            <a class="blue" href="/staff/categories/{{ $category->id }}/export">
                <span class="label label-info">
                    <i class="fa fa-table" aria-hidden="true"></i>
                        Export to Excel
				</span>
            </a>
            <a class="blue" href="/staff/categories/{{ $category->id }}/edit">
                <span class="label label-warning">
                        Update
				</span>
            </a>

        </div>

    </div>
    @if (count($category->children) > 0)
        <ol class="dd-list">
            @foreach($category->children as $category)
                @include('categories._subcat', $category)
            @endforeach
        </ol>
    @endif
</li>
