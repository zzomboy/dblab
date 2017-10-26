<?php
	include("template.class.php");
	$layout = new Template("layout.tpl");
	$layout->set('title','Help : IT Online Shopping website');
	$layout->set('content','

<!--Content-->
		<div style="width: 90%;margin: auto;margin-top: 20px;">
			<div class="about_text">
				<h3>Need help?</h3>
				<p><span>DLZ </span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				<p><span></span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel arcu at lorem accumsan facilisis non vel urna. Vivamus faucibus accumsan dui a tempus. Nam tortor tellus, laoreet non purus a, gravida blandit ligula. In feugiat elementum turpis nec dapibus. Cras malesuada, urna non mollis finibus, felis ante egestas nulla, in ultricies nisi sem non libero. Sed facilisis pulvinar ante, nec tempus turpis posuere nec. Fusce eu ultricies velit, sed malesuada magna. Mauris at risus eu nunc euismod lobortis mollis vitae lectus. Sed vitae nisl a mi finibus pretium. Sed volutpat tortor vitae posuere dapibus. Donec placerat elit commodo, placerat tellus non, consectetur tortor. Suspendisse ultricies, leo at pharetra volutpat, tortor eros pretium quam, vel commodo turpis nunc non metus. In metus metus, commodo et metus at, mollis finibus magna. Etiam vel ex in massa tristique maximus vitae a urna. Fusce non sem sed enim efficitur rutrum. </p>
				<p><span></span>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque fermentum sem ipsum, ut fermentum eros ultrices nec. Etiam gravida dolor a porttitor euismod. In eleifend urna id enim tincidunt, sed imperdiet elit mattis. Donec a finibus erat, imperdiet semper erat. Maecenas sit amet ligula id ante venenatis pharetra. Mauris eleifend scelerisque metus quis lacinia. Nam facilisis egestas ipsum, vitae rutrum est luctus at. Nulla ut venenatis tortor. Duis aliquam commodo accumsan. Nulla ut porta enim, ut tempus leo. Integer eget orci euismod, porttitor massa ac, suscipit enim. Nullam eget mauris a enim imperdiet tempus vel sit amet ligula. Suspendisse est libero, aliquet quis eros id, laoreet congue nulla. </p>
			</div>
		</div>
	');
	echo $layout->output();
?>