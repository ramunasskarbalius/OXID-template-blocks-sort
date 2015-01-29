<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>[{oxmultilang ident="RSSORTBLOCKS"}]</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="[{$oViewConf->getModuleUrl("rssortblocks", "out/src/css/style.css")}]">
    <style>
    </style>
</head>
<body>
<form action="" method="POST" id="blocksList">
    <div id="accordion">
        [{foreach from=$oView->getBlocksList() item="blocks" key="blockName"}]

        [{capture append="selectBoxes"}]$(".[{$blockName}]_el1").sortBlocks({enabledBlocks: ".[{$blockName}]_el1", disabledBlocks:".[{$blockName}]_el2", connectWith:".[{$blockName}]"});[{/capture}]

        <h4>[{$blockName}]</h4>

        <div class="sortable-content">
            <div>[{oxmultilang ident="RSSORTBLOCKS_ENABLED_BLOCKS"}]<br/>
                <ul class="[{$blockName}] sortable1 [{$blockName}]_el1">

                    [{foreach from=$blocks item="block" key="blockPosition"}]
                    [{if $block->getOxActive() eq 1}]
                    <li class="ui-state-default">
                        <strong>[{$block->getOxModule()}]</strong><br/>
                        [{$block->getOxFile()}]
                        <input type="hidden" name="sort[[{$blockName}]][enabled][]" value="[{$block->getOxid()}]"/>
                    </li>
                    [{/if}]
                    [{/foreach}]
                </ul>
            </div>
            <div>[{oxmultilang ident="RSSORTBLOCKS_DISABLED_BLOCKS"}]<br/>
                <ul class="[{$blockName}] sortable2 [{$blockName}]_el2">
                    [{foreach from=$blocks item="block" key="blockPosition"}]
                    [{if $block->getOxActive() eq 0}]
                    <li class="ui-state-highlight">
                        <strong>[{$block->getOxModule()}]</strong><br/>
                        [{$block->getOxFile()}]
                        <input type="hidden" name="sort[[{$blockName}]][disabled][]" value="[{$block->getOxid()}]"/>
                    </li>
                    [{/if}]
                    [{/foreach}]
                </ul>
            </div>
            <br class="clear"/>
            <input type="submit" value="[{oxmultilang ident="RSSORTBLOCKS_SAVE"}]" name="save"/>
        </div>
        [{/foreach}]
    </div>
</form>

<script src="[{$oViewConf->getModuleUrl("rssortblocks", "out/src/js/widgets/saveblocks.js")}]"></script>
<script src="[{$oViewConf->getModuleUrl("rssortblocks", "out/src/js/widgets/sortblocks.js")}]"></script>
<script>
    $("#blocksList").saveBlocks();
    $("#accordion").accordion();
    [{foreach from=$selectBoxes  item="box"}][{$box}][{/foreach}]
</script>
</body>
</html>
