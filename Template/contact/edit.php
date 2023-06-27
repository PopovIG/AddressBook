<style type="text/css">
    /* MODAL SIZE */
    /* #modal-box {
        width: auto !important;
    }*/

    #modal-content {
        padding: 10px 15px;
    }

    /* MODAL CLOSE BUTTON */
    #modal-close-button {
        transform: scale(1.5);
        display: inline-block;
        position: absolute;
        right: 6px;
        top: 6px;
        background: var(--pp-red-alt-2);
        padding: 3px 3px 5px 6px;
        border-bottom-left-radius: 3px;
        box-shadow: -1px -1px 0px 3px var(--pp-white);
    }

    #modal-close-button i {
        color: var(--pp-white);
        transition: var(--transition-address-book);
    }

    #modal-close-button:hover i {
        color: var(--pp-grey);
        text-shadow: 0 0 1px var(--pp-white);
    }
</style>

<div class="edit-contact-modal">
    <div class="ab-page-header">
        <h2 class=""><span class="contact-settings-icon"></span><?= t('Edit Contact') ?></h2>
    </div>
    <form class="modal-form" method="post" action="<?= $this->url->href('ContactsController', 'update', array('project_id' => $project['id'], 'contacts_id' => $contacts_id, 'plugin' => 'AddressBook')) ?>" autocomplete="on">

        <?= $this->form->csrf() ?>
        <?php foreach ($headings as $key => $value): ?>

            <?php
            $trimmedItemName = ucwords(strtolower($value));
            $trimmedItem = str_replace(array(' ', '|', '(', ')', '[', ']'), '', $trimmedItemName);
            ?>

            <div class="form-group">
                <?= $this->form->label($value, $key . '__' . $trimmedItem) ?>
                <?= $this->form->text($key . '__' . $trimmedItem, $values, $errors, array('maxlength="100"', 'placeholder="' . $value . '"'), 'property-input') ?>
            </div>
        <?php endforeach ?>

        <div class="form-actions">
            <button type="submit" class="btn btn-blue"><?= t('Save Edits') ?></button>
            <button class="btn cancel-btn js-modal-close" href="#"><?= t('Cancel') ?></button>
        </div>
    </form>
</div>
