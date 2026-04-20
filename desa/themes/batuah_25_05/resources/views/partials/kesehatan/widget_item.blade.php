
@push('styles')
<style type="text/css">
    .stunting-area{position:relative;overflow:hidden;padding:0 10px;}
    .stunting-col{position:relative;float:left;width:calc(33.33333333% - 10px);margin:5px;}
    .icon-stunting{min-width:50px;min-height:50px;max-width:50px;max-height:50px;border-radius:50px;background:rgba(0,0,0,0.2);margin:0 5px 0 0;}
    .stunting-col p{font-size:95%;margin:0padding:0;line-height:1;}
    @media (max-width: 992px) {
        .stunting-col{width:calc(100% - 10px);}
    }
</style>
@endpush

    <div class="stunting-col">
        <div class="bordered @@bg-color"  style="border-radius:5px;padding:5px">
            <div class="hiddenrelative flexleft" style="padding:10px 5px;">
                <div class="icon-stunting flexcenter"><i class="fa fa-2x @@icon"></i></div>
                <p style="margin-right:10px;">@@title</p>
                <h2 style="float:right;margin:0 0 0 auto;">@@total</h2>
            </div>
        </div>
    </div>