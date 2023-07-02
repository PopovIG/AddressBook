<?php $contacts = $this->ContactsHelper->getContactsIDs($task['id']) ?>

<details id="TaskContacts" class="accordion-section task-contacts-section" <?= empty($contacts) ? '' : 'open' ?>>
    <!-- Keep summary code intact -->
    <summary class="accordion-title"><span class="summary-wrapper"><span class="accordion-title-text"><?= t('Task Contacts') ?></span><span class="btn-count"><?= count($contacts) ?></span></span>
    </summary>
    <div class="accordion-content">
        <?php if (empty($contacts)): ?>
            <p class="alert alert-info no-contacts"><?= t('No contacts have been linked to this task') ?></p>
        <?php else: ?>
            <?php $items = $this->ContactsHelper->getItems() ?>
            <table id="TaskContactsTable" class="table-small table-fixed">
                <thead class="table-head">
                    <tr class="table-row">
                        <th class="contacts-table-header column-4 cell-zero"></th>
                        <th class="contacts-table-header column-24"><?= (empty($items[0])) ? "" : $items[0]['item'] ?></th>
                        <th class="contacts-table-header column-24"><?= (empty($items[1])) ? "" : $items[1]['item'] ?></th>
                        <th class="contacts-table-header column-24"><?= (empty($items[2])) ? "" : $items[2]['item'] ?></th>
                        <th class="contacts-table-header column-24"><?= (empty($items[3])) ? "" : $items[3]['item'] ?></th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php foreach ($contacts as $key => $value): ?>
                        <?php $values = $this->ContactsHelper->getContactByID($value['contacts_id']) ?>
                        <tr class="table-row">
                            <td class="contacts-table-value text-center cell-zero">
                                <!-- Modal Button -->
                                <a href="<?= $this->url->href('ContactsController', 'details', array('contacts_id' => $value['contacts_id'], 'plugin' => 'AddressBook'), false, '', false) ?>" class="btn js-modal-medium view-contact-btn" title="<?= t('View Contact') ?>">
                                    <span class="contact-profile-icon"></span>
                                </a>
                            </td>
                            <td class="contacts-table-value" title="">
                                <?php foreach ($values as $array_key => $array_value): ?>
                                    <?php if (current($values[$array_key]) && ($values[$array_key]['position'] == 1)): ?>
                                        <?= $values[$array_key]['contact_item_value'] ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                            <td class="contacts-table-value" title="">
                                <?php foreach ($values as $array_key => $array_value): ?>
                                    <?php if (current($values[$array_key]) && ($values[$array_key]['position'] == 2)): ?>
                                        <?= $values[$array_key]['contact_item_value'] ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                            <td class="contacts-table-value" title="">
                                <?php foreach ($values as $array_key => $array_value): ?>
                                    <?php if (current($values[$array_key]) && ($values[$array_key]['position'] == 3)): ?>
                                        <?= $values[$array_key]['contact_item_value'] ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                            <td class="contacts-table-value" title="">
                                <?php foreach ($values as $array_key => $array_value): ?>
                                    <?php if (current($values[$array_key]) && ($values[$array_key]['position'] == 4)): ?>
                                        <?= $values[$array_key]['contact_item_value'] ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    </div>
</details>
