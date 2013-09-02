<?php

class AppError extends ErrorHandler {

        function __construct($method, $messages) {
                parent::__construct($method, $messages);
        }

        function __outputMessage($template) {
				$this->controller->beforeFilter();
    			//parent::__outputMessage($template);
                //$this->controller->render($template);
                //$this->controller->afterFilter();
							
                $this->controller->output = null;
                $this->controller->render('missing_controller', 'default');
                echo $this->controller->output;
        }
			
}

?>