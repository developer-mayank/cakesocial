function noUni()
{
	if ($F('SchoolId') == 'no')
	{
		Element.show('div_autoComplete');
	}
	else
	{
		Element.hide('div_autoComplete');
	}
}