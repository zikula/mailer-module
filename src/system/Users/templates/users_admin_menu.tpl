{ajaxheader modname='Users' filename='users.js' ui=true}

{admincategorymenu}
<div class="z-adminbox">
    <h1>{gt text='Users manager'}</h1>
    {modulelinks modname='Users' type='admin'}
    {if !empty($modvars.ZConfig.profilemodule)}
    {modulelinks menuid='profileadminlinks' menuclass='z-hide z-menulinks' modname=$modvars.ZConfig.profilemodule type='admin'}
    {/if}
</div>
