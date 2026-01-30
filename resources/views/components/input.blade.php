<?php
class Input extends Component
{
    public function __construct(
        public string $name,
        public string $type = 'text',
        public string $label = '',
        public string $value = ''
    ) {
    }
    public function render()
    {
        return view('components.input');
    }

}
?>