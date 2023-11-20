<?php

/**
 * @var yii\web\View $this
 * @var int $id
 */

$this->title = 'Wiam test';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <img src="https://picsum.photos/id/<?php echo $id ?>/600/500" />
            <div class="d-flex justify-content-center mt-2">
                <div style="margin-right: 5px">
                    <p>
                        <a class="btn btn-lg btn-outline-secondary" href="#" onclick="approving(false);return false;">Отклонить</a>
                    </p>
                </div>
                <p>
                    <a class="btn btn-lg btn-success" href="#" onclick="approving(false);return false;">Одобрить</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    const approving = (isApproved) => {
        $.ajax({
            url: '/site/approval',
            type: 'post',
            data: {
                picture_id: parseInt("<?php echo $id ?>"),
                is_approved: isApproved,
            },
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {
                alert('Failed to approve picture!');
            },
        });
    }
</script>