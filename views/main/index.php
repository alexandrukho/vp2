<?php
require_once "./views/templates/header.php"
?>

    <table class="table main-table">
        <thead>
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Avatar</th>
            <th class="text-center">Age
                <a href="/users/desc" class="fa fa-arrow-down sort-by-age"></a>
                <a href="/users/asc" class="fa fa-arrow-up sort-by-age"></a>
            </th>
        </tr>
        </thead>
        <tbody>
        <? if (!empty($data['desc'])) : ?>
            <? foreach ($data['desc'] as $val) : ?>
                <tr class="text-center">
                    <td><? echo $val->name ?></td>
                    <td class="text-center"><img src="<? echo $val->avatar ?>" alt="user avatar"></td>
                    <? if ($val->age >= 18) : ?>
                        <td class="text-success"><? echo $val->age ?> Совершеннолетний</td>
                    <? else : ?>
                        <td class="text-warning"><? echo $val->age ?> Несовершеннолетний</td>
                    <? endif; ?>
                </tr>
            <? endforeach; ?>

        <? elseif (!empty($data['asc'])) : ?>
            <? foreach ($data['asc'] as $val) : ?>
                <tr class="text-center">
                    <td><? echo $val->name ?></td>
                    <td class="text-center"><img src="<? echo $val->avatar ?>" alt="user avatar"></td>
                    <? if ($val->age >= 18) : ?>
                        <td class="text-success"><? echo $val->age ?> Совершеннолетний</td>
                    <? else : ?>
                        <td class="text-warning"><? echo $val->age ?> Несовершеннолетний</td>
                    <? endif; ?>
                </tr>
            <? endforeach; ?>

        <? elseif (!empty($data)) : ?>
            <? foreach ($data as $val) : ?>
                <tr class="text-center">
                    <td><? echo $val->name ?></td>
                    <td class="text-center"><img src="<? echo $val->avatar ?>" alt="user avatar"></td>
                    <td><? echo $val->age ?></td>
                </tr>
            <? endforeach; ?>

        <? endif; ?>
        </tbody>
    </table>

<?php
require_once "./views/templates/footer.php"
?>