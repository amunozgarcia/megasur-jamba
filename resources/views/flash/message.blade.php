@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('jamba::flash.modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @elseif (Session::has('flash_notification.alert'))

    @else
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {!! Session::get('flash_notification.message') !!}
        </div>
    @endif
@endif