# Speaker Content Type

The speaker holds data for someone providing a talk or a workshop.
These informations are meant to help website visitors to get convinced by his/her profile.

## Fields

* `title`: speaker full name;
* `thumbnail`: a profile picture reused in several place as
 * `tiny-thumbnail` format: a `60x60` squared picture;
 * `post-thumbnail` format: a wide `870x220` banner;
* `content`: a self-presentation in the speaker native language;
* `excerpt`: a short summary, in French – 1 or 2 sentences maximum;

## Relationships

* A speaker can be connected to 0, 1 or many `Talk`.
