<table class="text-center w-100">
    <tr><td valign="middle" style="height: 140px">
        @if ($s->show_logo)
            <img src="../../public/assets/images/logo.png"
                class="img-fluid" alt="" srcset="">
        @endif
    </td></tr>
    <tr><td valign="top" style="height: 140px; color: #{{ $s->top_text_color }}" class="font-weight-bold">                                                                          
        @if ($s->top_text)
            {{ $s->top_text }}
        @endif
    </td></tr>
    <tr><td valign="top" style="color: #{{ $s->middle_text_color }}; height: 140px"  class="font-weight-bold">
        @if ($s->middle_text)
            {{ $s->middle_text }}
        @endif
    </td></tr>
<tr><td valign="top" style="height: 140px" class="pb-2">
    <p>&nbsp;</p>
    @foreach ($buttons as $b)
        @if ($b->step == $s->step)
            <a class="btn w-100 p-2 mb-3"
                href="{{ route('manage-surgical-screens', ['id' => $s->algorithm_id, 'action' => 'screens', 'step' => $step + 1, 'option' => $b->button_option ]) }}" 
                style="background-color:#{{ $b->bgcolor }}; color:#{{ $b->txtcolor }}">{{ $b->text }}</a>
        @endif
    @endforeach
</td></tr>                                                                        
</table>