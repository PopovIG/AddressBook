<?php $items = $this->ContactsHelper->getItems() ?>
<div class="relative">
    <div class="ab-page-header">
        <h2 class=""><span class="project-contacts-icon"></span><?= t('Project Contacts') ?></h2>
    </div>

    <?php if ($this->user->hasAccess('UserListController', 'show')): ?>
        <a href="<?= $this->url->href('ContactsItemsController', 'config', array('plugin' => 'AddressBook')) ?>" class="btn address-book-btn">
            <span class="address-book-icon"></span> <?= t('Address Book Settings') ?>
        </a>
    <?php endif ?>

    <?php if (empty($contacts)): ?>
        <p class="alert alert-info no-contacts"><?= t('No contacts found') ?></p>
    <?php endif ?>
    <p class="ab-info">
        <?= e('This section lists all contacts for the %s project. Once you have added contacts here, you can link any contact to any task within this project.', '<strong>' . $project['name'] . '</strong>') ?>
    </p>
    <?php if (!empty($contacts)): ?>
        <section class="project-contacts-section">
            <table id="ProjectContactsTable" class="project-contacts-table table-small table-fixed">
                <thead class="table-head">
                    <tr class="table-row">
                        <th class="contacts-table-header column-20"><?= (empty($items[0])) ? "" : $items[0]['item'] ?></th>
                        <th class="contacts-table-header column-20"><?= (empty($items[1])) ? "" : $items[1]['item'] ?></th>
                        <th class="contacts-table-header column-20"><?= (empty($items[2])) ? "" : $items[2]['item'] ?></th>
                        <th class="contacts-table-header column-20"><?= (empty($items[3])) ? "" : $items[3]['item'] ?></th>
                        <th class="contacts-table-header column-21"><?= t('Actions') ?></th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php foreach ($contacts as $key => $value): ?>
                        <?php $values = $this->ContactsHelper->getContactByID($value['contacts_id']) ?>
                        <tr class="table-row">
                            <td class="contacts-table-value">
                                <?= (empty($values[1])) ? "" : $values[1]['contact_item_value'] ?>
                            </td>
                            <td class="contacts-table-value">
                                <?= (empty($values[2])) ? "" : $values[2]['contact_item_value'] ?>
                            </td>
                            <td class="contacts-table-value">
                                <?= (empty($values[3])) ? "" : $values[3]['contact_item_value'] ?>
                            </td>
                            <td class="contacts-table-value">
                                <?= (empty($values[4])) ? "" : $values[4]['contact_item_value'] ?>
                            </td>
                            <td class="contacts-table-value">
                                <ul class="contacts-action-btns">
                                    <li class="">
                                        <?php if (!empty($values[5])): ?>
                                            <!-- Modal Button -->
                                            <a href="<?= $this->url->href('ContactsController', 'details', array('contacts_id' => $value['contacts_id'], 'plugin' => 'AddressBook'), false, '', false) ?>" class="btn js-modal-medium view-contact-btn" title="<?= t('View more information for this contact') ?>">
                                                <span class="contact-profile-icon"></span>
                                            </a>
                                        <?php else: ?>
                                            <!-- Modal Button -->
                                                <a href="<?= $this->url->href('ContactsController', 'details', array('contacts_id' => $value['contacts_id'], 'plugin' => 'AddressBook'), false, '', false) ?>" class="btn js-modal-medium view-contact-btn no-info" title="<?= t('View Contact') ?>">
                                                    <span class="contact-profile-icon"></span>
                                                </a>
                                        <?php endif ?>
                                    </li>
                                    <li class="">
                                        <!-- Modal Button -->
                                        <a href="<?= $this->url->href('ContactsController', 'edit', array('project_id' => $project['id'], 'contacts_id' => $value['contacts_id'], 'plugin' => 'AddressBook'), false, '', false) ?>" class="btn btn-ab-rename js-modal-medium" title="<?=t('Edit Contact') ?>">
                                            <span class="rename-icon"></span> <?= t('Edit') ?>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?= $this->url->href('ContactsController', 'confirm', array('project_id' => $project['id'], 'contacts_id' => $value['contacts_id'], 'plugin' => 'AddressBook'), false, '', false) ?>" class="btn btn-ab-delete js-modal-medium" title="<?=t('Delete Contact') ?>">
                                            <span class="delete-contact-icon"></span>
                                            <span class="delete-text"><?= t('Delete') ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>
    <?php endif ?>
    <hr class="ab-section-divider">
    <?php if (isset($addNew) && $addNew): ?>
        <section class="add-new-contact-section">
            <?= $this->render('addressBook:contact/add', array('items' => $items, 'project_id' => $project['id'], 'values' => $values, 'errors' => $errors)) ?>
        </section>
    <?php endif ?>
</div>
