<table class="text-center w-100">
    <tr><td valign="middle" style="height: 140px">
        @if ($s->show_logo)
            <img src="../../public/assets/images/logo.png"
                class="img-fluid" alt="" srcset="">
        @endif
    </td></tr>
    <tr><td valign="middle" style="height: 140px; color: #{{ $s->top_text_color }}">                                                                          
        @if ($s->top_text)
            {{ $s->top_text }}
        @endif
    </td></tr>
    <tr><td valign="middle" style="color: #{{ $s->middle_text_color }}; height: 140px">
        @if ($s->middle_text)
            {{ $s->middle_text }}
        @endif
    </td></tr>
<tr><td valign="middle" style="height: 140px">
    <p>&nbsp;</p>
    @foreach ($buttons as $b)
        @if ($b->step == $s->step)
            <a class="btn w-100"
                href="{{ route('manage-surgical-screens', ['id' => $s->algorithm_id, 'action' => 'view', 'step' => $step + 1, 'option' => $b->button_option ]) }}" 
                style="background-color:#{{ $b->bgcolor }}; color:#{{ $b->txtcolor }}">{{ $b->text }}</a><br /><br />
        @endif
    @endforeach
</td></tr>                                                                        
</table>