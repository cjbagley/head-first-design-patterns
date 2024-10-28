from commands import Command


class MacroCommand(Command):
    def __init__(self, commands: [Command]):
        self.commands = commands

    def execute(self):
        for command in self.commands:
            command.execute()
