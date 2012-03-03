# Talk Content Type

The talk holds data for a time limited representation by a speaker.
These informations are meant to help website visitors to understand what they will learn and discover.

## Fields

* `title`: conference full title;
* `thumbnail`: an illustration for this talk – generally a photo made during the event
 * `tiny-thumbnail` format: a `60x60` squared picture;
 * `post-thumbnail` format: a wide `870x220` banner;
 * `thumbnail` format: a `150x150` squared picture;
* `content`: a long description of the talk (used only in single view);
* `excerpt`: a short summary, in French (used in list view);
* `schedule`: the time at which the talk starts (using `get_field` or `the_field`);
* `talk_types`: talk format, implying its duration (provided by native taxonomy – `get_the_terms`);
* `language`: the language used by the speaker during the talk;


## Relationships

These relationships are displayed as fields, but enables to connect to another existing post:

* A talk **must** be connected to 1 or many `Speaker`;
* A talk **must** be connected to 1 `Schedule`.
