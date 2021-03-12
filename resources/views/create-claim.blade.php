@extends('master')
@section('content')

<div class="create-claim p-4">
    <h3>Let's get your claim started!</h3>
    <h6>We'll first get some information to get started.</h6>

    <form method='post' action='/create/save'>

    @csrf

    <div>
        @include('components/form/input', [
            'blockLevel' => true,
            'caption' => 'Company name:',
            'type' => 'text',
            'name' => 'company_name'
        ])

        @include('components/form/input', [
            'blockLevel' => true,
            'caption' => 'Company logo url:',
            'type' => 'text',
            'name' => 'company_logo'
        ])

        @include('components/form/input', [
            'blockLevel' => true,
            'caption' => 'Take claim button text:',
            'type' => 'text',
            'name' => 'take_claim_text',
            'value' => 'Click to see if you\'ve won!'
        ])

        <div class="pt-1">
            <input type="submit" class="btn btn-primary" value="Get Started" />
        </div>
    </div>
    </form>
</div>

@endsection

