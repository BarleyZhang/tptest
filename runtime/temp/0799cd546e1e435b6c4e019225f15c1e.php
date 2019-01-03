<?php /*a:1:{s:49:"E:\DEV\tp5\application\index\view\news\index.html";i:1546498832;}*/ ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo htmlentities($info['title']); ?></h1>
            <p>发布时间:<?php echo htmlentities($info['create_time']); ?> 阅读:<?php echo htmlentities($info['pv']); ?> 作者:<?php echo htmlentities($info['author']); ?></p>
            <img src="<?php echo htmlentities($info['img']); ?>" class="img-responsive" style="width: 100%">
        </div>
        <div class="col-md-12 text-center">
            <h4>正文开始</h4>
            <p><?php echo htmlentities($info['content']); ?></p>
        </div>
        <div class="col-md-4 text-center"></div>
        <div class="col-md-4 text-center">
            <h4>快速分享</h4>
            <strong>赋值并转发下方的文章地址,十分感谢!</strong>
            <textarea class="form-control"><?php echo htmlentities($shorturl); ?></textarea>
        </div>
        <div class="col-md-4 text-center"></div>
    </div>
</div>