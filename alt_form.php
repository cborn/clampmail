<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

require_once($CFG->libdir . '/formslib.php');

class quickmail_alternate_form extends moodleform {
    public function definition() {
        $m =& $this->_form;

        $course = $this->_customdata['course'];

        $m->addElement('header', 'alt_header', $course->fullname);
        $m->addElement('text', 'address', get_string('email'));
        $m->setType('address', PARAM_NOTAGS);
        $m->addRule('address', get_string('missingemail'), 'required', null, 'server');

        $m->addElement('hidden', 'valid', 0);
        $m->addElement('hidden', 'courseid', $course->id);
        $m->addElement('hidden', 'id', '');
        $m->addElement('hidden', 'action', $this->_customdata['action']);

        $buttons = array(
            $m->createElement('submit', 'submit', get_string('savechanges')),
            $m->createElement('cancel')
        );

        $m->addGroup($buttons, 'buttons', '', array(' '), false);

        $m->closeHeaderBefore('buttons');
    }
}
