<?php 

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class NavigationViewComposer
{
	public function compose(View $view)
	{   
		/*authentication hiigdsen bol*/
		if (auth()->check()) {
			/*auth hiigdsen user class iin companies --g companies
			 huwisagch bolgon nav bar deer haruulna*/
			 
			$view->with('companies', auth()->user()->companies);
		}
		
	}
}




 ?>