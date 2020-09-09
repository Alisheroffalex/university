<?
    $newValue = get_query_var('arg');
?>
<div class="person-card small-card partner-card">
    <div class="row"> 
            <div class="person-img">    <img src="<? echo $newValue['img'] ?>"></div>
            <div class="person-info"> 
            <h3 class="normal-header"><? echo $newValue['post_title']; ?></h3>
            <div class="row info-row"> 
                <div class="col"> 
                <p class="gray-text"> <? _e('Государство:', 'univer') ?></p>
                </div>
                <div class="col-2"> 
                <p class="gray-text"> <b><? echo $newValue['country']; ?></b></p>
                </div>
            </div>
            <div class="row info-row"> 
                <div class="col"> 
                <p class="gray-text"><? _e('Об учреждении:', 'univer') ?></p>
                </div>
                <div class="col-2"> 
                <p class="gray-text"> <b><? echo $newValue['about'] ?></b></p>
                </div>
            </div>
            <div class="row info-row"> 
                <div class="col"> 
                <p class="gray-text"><? _e('Официальный сайт:', 'univer') ?></p>
                </div>
                <div class="col-2"> <a class="gray-text blue-text" href="<? echo $newValue['link'] ?>"> <b><? echo $newValue['link'] ?></b></a></div>
            </div>
            <div class="row info-row responsive center"><a class="blue-text" href="<? echo $newValue['link'] ?>"><? _e('Подробнее', 'univer') ?></a></div>
            </div>
        </div>
    </div>
