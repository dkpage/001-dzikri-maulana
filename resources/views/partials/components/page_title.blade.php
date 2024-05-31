<?php
$path = $_SERVER['REQUEST_URI'];
$pageRoute = explode('/', $path);
unset($pageRoute[0]);
?>



<div class="container-fluid py-1 mt-4" style="min-height: 10px;">
    @isset($title)


        @if ($title == 'Dashboard' or $title == 'Beranda')
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                Hallo, <b>{{ $user->name }}</b>
            </h3>
        @else
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                <?= $title ?>
            </h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <?php 
            foreach($pageRoute as $page) :
            ?>
                    <li class="breadcrumb-item text-muted" aria-current="page">
                        @if ($page !== '')
                            @if (!is_numeric($page))
                                {{ ucwords(str_replace('_', ' ', $page)) }}
                            @endif
                        @endif
                    </li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        @endif
    @endisset

</div>
