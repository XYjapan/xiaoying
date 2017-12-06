@component('mail::message')
    ###表单来源地址: <a href="{{ $from  }}">{{ $from }}</a>
@component('mail::table')
    |   Key   |   Value   |
    | -------: | :------: |
    @foreach( $base_info as $k => $v )
        @if( $k == 'tel' )
            | {{ $alias[$k] }}|<a href="tel:{{ $v }}">{{ $v }}</a>  |
        @else
            | {{ $alias[$k] }}|{{ $v }}  |
        @endif
    @endforeach
@endcomponent
<br />   来自于评估页面，为精准用户，按学科分配给对应的顾问，尽快电话对应。以上内容已录入纷享逍客CRM系统，请顾问随时在CRM反馈跟进进度。
@endcomponent