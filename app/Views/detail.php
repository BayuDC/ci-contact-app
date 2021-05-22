<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<div class="uk-container uk-container-xsmall">
    <?php if (session()->getFlashData('message')) : ?>
        <div class="uk-alert-primary" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= session()->getFlashData('message') ?></p>
        </div>
    <?php endif ?>
    <div class="uk-card uk-card-default">
        <div class="uk-card-header uk-padding-small">
            <div class="uk-margin-small-top">
                <img src="/img/<?= $contact['picture'] ?>" alt="" class="uk-display-block uk-margin-auto uk-border-circle uk-box-shadow-medium img-medium">
            </div>
            <h3 class="uk-card-title uk-text-center uk-margin-small-top"><?= $contact['name'] ?></h3>
        </div>
        <div class="uk-card-body uk-padding-small">
            <table class="uk-table uk-table-divider uk-table-small uk-table-responsive uk-overflow-auto">
                <tr>
                    <td class="uk-text-emphasis uk-width-small">No. Telepon</td>
                    <td><?= $contact['phone'] ?></td>
                </tr>
                <tr>
                    <td class="uk-text-emphasis">Email</td>
                    <td><?= $contact['email'] ?></td>
                </tr>
                <tr>
                    <td class="uk-text-emphasis">Alamat</td>
                    <td><?= $contact['address'] ?></td>
                </tr>
            </table>
        </div>
        <div class="uk-card-footer uk-padding-small">
            <div class="uk-flex uk-flex-column flex-row-s">
                <a class="uk-button uk-button-primary margin-right-s">Edit</a>
                <a href="#modal-delete" class="uk-button uk-button-danger" uk-toggle>Hapus</a>
                <a href="<?= session()->getFlashData('message') ? '/new' : '/' ?>" class="uk-button uk-button-default uk-flex-first@s uk-margin-auto-right@s">Kembali</a>
                <div id="modal-delete" uk-modal>
                    <div class="uk-modal-dialog uk-margin-auto-vertical uk-width-large">
                        <div class="uk-card uk-card-default uk-card-body uk-text-center">
                            <h3 class="uk-card-title uk-margin-small-bottom">Hapus Kontak?</h3>
                            <p class="uk-margin-remove-bottom uk-margin-small-top uk-text-emphasis">
                                <?= $contact['name'] ?>
                            </p>
                            <p class="uk-margin-remove">
                                <?= $contact['phone'] ?>
                            </p>
                        </div>
                        <form action="/contact" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="id" value="<?= $contact['id'] ?>">

                            <div class="uk-modal-footer uk-padding-small uk-flex uk-flex-column flex-row-s">
                                <button class="uk-button uk-button-danger uk-margin-auto-left@s" type="submit">Hapus</button>
                                <button class="uk-button uk-button-default uk-modal-close uk-flex-first@s" type="button">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>