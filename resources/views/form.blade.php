


<div>

    <div class="mb-4 flex justify-between items-center border-b-2 border-blue-500/50 pb-1">
        <h2 class="text-lg text-blue-500 dark:text-blue-200">
            {!! 'Create New Role' !!}
        </h2>

        <div>
            <a class="btn btn-primary" href="{{ route('admin.roles.index') }}">
                <x-button-lg-right type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
                    </svg>
                </x-button-lg-right>
            </a>
        </div>

    </div>

    <x-jet-validation-errors ></x-jet-validation-errors>

    {!! Form::open(array('route' => 'admin.form.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br/>
                @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>

